<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateProductDescriptions extends Seeder
{
    public function run(): void
    {
        $descriptions = [
            // Printers
            'HP LaserJet' => "High-performance HP LaserJet printer designed for professional office environments. Features fast print speeds, sharp 1200dpi resolution, automatic duplex printing, and seamless network connectivity. Ideal for high-volume printing in offices, schools, and businesses across Kenya.",

            'Kyocera ECOSYS' => "The Kyocera ECOSYS is a versatile A4 color multifunction laser printer engineered for dynamic work environments. Key features include:\n• Print, Copy, Scan multifunction capabilities\n• Speed: Up to 35 pages per minute (ppm) in color & B/W\n• Resolution: 1200 x 1200 dpi for high-quality prints\n• Duplex Printing: Automatic double-sided printing\n• Processor: ARM Cortex-A9 Dual core 1.2 GHz\n• Memory: 1.5 GB standard, expandable to 3 GB",

            'Kyocera TASKalfa' => "The Kyocera TASKalfa is a high-speed A3 color multifunction photocopier built for demanding office environments. Compatible with Kyocera TK toner series. Features advanced document management, network scanning, and high-capacity paper handling. Perfect for corporate offices, print shops, and educational institutions.",

            'Konica Minolta' => "The Konica Minolta bizhub is a powerful A3 color multifunction photocopier offering exceptional print quality and productivity. Featuring intuitive touchscreen control, high-speed duplex printing, scan-to-email, and robust security features. Available new and refurbished with full warranty.",

            // Toners
            'TK-5370' => "Genuine Kyocera TK-5370 Toner Kit for ECOSYS PA3500cx, MA3500cix, and MA3500cifx printers. Available in Black, Cyan, Magenta, and Yellow. High-yield cartridge delivers sharp, vibrant prints with consistent quality. Up to 30% off — now in stock with fast countrywide delivery.",

            'TK-8335' => "Genuine Kyocera TK-8335 Toner Kit for TASKalfa 3252ci multifunction printer. Available in Cyan (C), Magenta (M), Yellow (Y), and Black (K). High-capacity toner with excellent page yield, delivering crisp professional-quality color output.",

            'TK-8455' => "Genuine Kyocera TK-8455 Toner Kit for TASKalfa MZ2501ci and MZ2501ciW printers. Full CMYK set available. Engineered for consistent, high-quality color output with long-lasting cartridge life.",

            'HP 222' => "Original HP 222A LaserJet Toner Cartridge (W2223A) — Magenta. Compatible with HP LaserJet Pro 3203, 3288, MFP 3303, and MFP 3388. TerraJet technology delivers exceptional performance with responsible design. Genuine HP toner ensures reliable printing and protects your printer warranty.",

            'HP 125' => "Original HP 125A Cyan LaserJet Toner Cartridge (CB541A). Compatible with HP Color LaserJet CP1215, CP1515n, CP1518ni, and CM1312 MFP series. Delivers consistent, professional-quality color prints with genuine HP reliability.",

            'HP 507' => "Original HP 507A Toner Cartridge. Compatible with HP LaserJet Enterprise 500 color MFP M575dn, M575f, M575c, Printer M551dn, M551n, M551xh, and Pro 500 color MFP M570dn, M570dw. Superior, professional results every time.",

            // Laptops
            'HP EliteBook 840' => "HP EliteBook 840 G7 — Built for business professionals who demand performance and security. Features Intel Core i5 10th Generation processor, 8GB RAM, 256GB SSD, 14-inch FHD display, and Windows 10 Pro. Military-grade durability tested, with all-day battery life. Refurbished to full working condition with 6-month warranty.",

            'HP EliteBook 850' => "HP EliteBook 850 G7 — Premium 15.6-inch business laptop with Intel Core i5 10th Gen, 16GB RAM, 512GB SSD. Exceptional performance for power users with enterprise-grade security features, fast charging, and stunning FHD display. Refurbished with 6-month warranty.",

            'HP ProBook' => "HP ProBook business laptop featuring Intel Core i5 processor, 8GB RAM, and 256GB SSD storage. Reliable, durable, and designed for everyday business use. Comes with Windows 10, full HD display, and long battery life. Refurbished to excellent condition with 6-month warranty.",

            // Spares
            'Fuser' => "High-quality fuser unit/assembly compatible with major photocopier and printer brands including Kyocera, Ricoh, Konica Minolta, and Canon. Restores your machine's fusing performance to like-new condition. Tested before dispatch. Includes installation guide.",

            'Developer' => "Genuine developer kit (CMYK set) for Konica Minolta bizhub C220/C280/C360 series. Each pack contains Cyan, Magenta, Yellow, and Black developer powder. Restores print quality and drum performance. Top quality, best prices.",

            'Drum' => "Compatible drum unit/OPC drum for use in Kyocera, Ricoh, Konica Minolta, and Canon photocopiers. Restores sharp, consistent print quality. Genuine-spec components tested for reliability and long service life.",
        ];

        $products = DB::table('products')->get();
        $updated = 0;

        foreach ($products as $product) {
            foreach ($descriptions as $keyword => $desc) {
                if (str_contains($product->name, $keyword)) {
                    DB::table('products')->where('id', $product->id)->update(['description' => $desc]);
                    echo "✓ [{$product->id}] {$product->name}\n";
                    $updated++;
                    break;
                }
            }
        }

        echo "\nDone! Updated {$updated} product descriptions.\n";
    }
}
