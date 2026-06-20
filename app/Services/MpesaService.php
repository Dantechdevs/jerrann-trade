<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class MpesaService
{
    private Client $client;
    private string $baseUrl;
    private string $consumerKey;
    private string $consumerSecret;
    private string $shortcode;
    private string $passkey;
    private string $callbackUrl;

    public function __construct()
    {
        $env = config('mpesa.env', 'sandbox');

        $this->baseUrl        = $env === 'live'
            ? 'https://api.safaricom.co.ke'
            : 'https://sandbox.safaricom.co.ke';

        $this->consumerKey    = config('mpesa.consumer_key');
        $this->consumerSecret = config('mpesa.consumer_secret');
        $this->shortcode      = config('mpesa.shortcode');
        $this->passkey        = config('mpesa.passkey');
        $this->callbackUrl    = config('mpesa.callback_url');

        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 30,
        ]);
    }

    /**
     * Get OAuth access token from Safaricom.
     */
    public function getAccessToken(): string
    {
        $credentials = base64_encode("{$this->consumerKey}:{$this->consumerSecret}");

        $response = $this->client->get('/oauth/v1/generate?grant_type=client_credentials', [
            'headers' => ['Authorization' => "Basic {$credentials}"],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }

    /**
     * Initiate STK Push payment prompt.
     */
    public function stkPush(string $phone, int $amount, string $reference, string $description = 'Payment'): array
    {
        $token     = $this->getAccessToken();
        $timestamp = now()->format('YmdHis');
        $password  = base64_encode($this->shortcode . $this->passkey . $timestamp);

        // Normalize Kenyan phone number → 2547XXXXXXXX
        $phone = preg_replace('/^0/', '254', $phone);
        $phone = preg_replace('/^\+/', '', $phone);

        try {
            $response = $this->client->post('/mpesa/stkpush/v1/processrequest', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'BusinessShortCode' => $this->shortcode,
                    'Password'          => $password,
                    'Timestamp'         => $timestamp,
                    'TransactionType'   => 'CustomerPayBillOnline',
                    'Amount'            => $amount,
                    'PartyA'            => $phone,
                    'PartyB'            => $this->shortcode,
                    'PhoneNumber'       => $phone,
                    'CallBackURL'       => $this->callbackUrl,
                    'AccountReference'  => $reference,
                    'TransactionDesc'   => $description,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('M-Pesa STK Push failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Process the M-Pesa callback payload.
     */
    public function processCallback(array $payload): array
    {
        $result = $payload['Body']['stkCallback'] ?? [];

        return [
            'merchant_request_id' => $result['MerchantRequestID'] ?? null,
            'checkout_request_id' => $result['CheckoutRequestID'] ?? null,
            'result_code'         => $result['ResultCode'] ?? -1,
            'result_desc'         => $result['ResultDesc'] ?? 'Unknown',
            'mpesa_receipt'       => $this->extractItem($result, 'MpesaReceiptNumber'),
            'amount'              => $this->extractItem($result, 'Amount'),
            'phone'               => $this->extractItem($result, 'PhoneNumber'),
            'transaction_date'    => $this->extractItem($result, 'TransactionDate'),
        ];
    }

    private function extractItem(array $result, string $name): mixed
    {
        $items = $result['CallbackMetadata']['Item'] ?? [];
        foreach ($items as $item) {
            if ($item['Name'] === $name) {
                return $item['Value'] ?? null;
            }
        }
        return null;
    }
}
