<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignProductImages extends Seeder
{
    public function run(): void
    {
        $map = [
            // Keywords in product name => image path
            'fuser'        => 'images/products/fuser-unit.png',
            'developer'    => 'images/products/developer-kit.png',
            'elitebook 840'=> 'images/products/hp-elitebook-840.png',
            'elitebook 850'=> 'images/products/hp-elitebook-850.png',
            'probook'      => 'images/products/hp-elitebook-840.png',
            'hp 222'       => 'images/products/hp-222a-magenta.png',
            '222a'         => 'images/products/hp-222a-magenta.png',
            'taskalfa'     => 'images/products/kyocera-taskalfa.png',
            'tk-8455'      => 'images/products/kyocera-tk8455-set.png',
            'tk8455'       => 'images/products/kyocera-tk8455-set.png',
            'kyocera'      => 'images/products/kyocera-panel.png',
            'laserjet'     => 'images/products/hp-222a-magenta.png',
            'hp laser'     => 'images/products/hp-222a-magenta.png',
        ];

        $products = DB::table('products')->get();
        $updated = 0;

        foreach ($products as $product) {
            $nameLower = strtolower($product->name);
            foreach ($map as $keyword => $image) {
                if (str_contains($nameLower, $keyword)) {
                    DB::table('products')
                        ->where('id', $product->id)
                        ->update(['image' => $image]);
                    echo "✓ [{$product->id}] {$product->name} → {$image}\n";
                    $updated++;
                    break;
                }
            }
        }

        echo "\nDone! Updated {$updated} products.\n";
    }
}
