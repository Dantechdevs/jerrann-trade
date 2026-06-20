<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@jeranntraders.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
            'phone'    => '0700000000',
        ]);

        // Sample customer
        User::create([
            'name'     => 'Test Customer',
            'email'    => 'customer@jeranntraders.com',
            'password' => Hash::make('password'),
            'role'     => 'customer',
            'phone'    => '0711111111',
        ]);

        // Categories
        $categories = [
            ['name' => 'Printers',    'slug' => 'printers',    'icon' => '🖨️'],
            ['name' => 'Laptops',     'slug' => 'laptops',     'icon' => '💻'],
            ['name' => 'Tablets',     'slug' => 'tablets',     'icon' => '📱'],
            ['name' => 'Inks & Toners','slug' => 'inks-toners','icon' => '🖊️'],
            ['name' => 'Accessories', 'slug' => 'accessories', 'icon' => '🔌'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Sample products
        $products = [
            ['name' => 'HP LaserJet Pro M404dn',    'price' => 32000, 'stock' => 10, 'category_id' => 1, 'brand' => 'HP'],
            ['name' => 'Canon PIXMA G3411',          'price' => 15000, 'stock' => 15, 'category_id' => 1, 'brand' => 'Canon'],
            ['name' => 'Epson EcoTank L3250',        'price' => 18500, 'stock' => 8,  'category_id' => 1, 'brand' => 'Epson'],
            ['name' => 'Dell Latitude 5540',         'price' => 95000, 'stock' => 5,  'category_id' => 2, 'brand' => 'Dell'],
            ['name' => 'HP EliteBook 840 G10',       'price' => 110000,'stock' => 4,  'category_id' => 2, 'brand' => 'HP'],
            ['name' => 'Lenovo ThinkPad E14',        'price' => 88000, 'stock' => 6,  'category_id' => 2, 'brand' => 'Lenovo'],
            ['name' => 'Samsung Galaxy Tab S9',      'price' => 75000, 'stock' => 7,  'category_id' => 3, 'brand' => 'Samsung'],
            ['name' => 'HP 305 Black Ink Cartridge', 'price' => 1200,  'stock' => 50, 'category_id' => 4, 'brand' => 'HP'],
            ['name' => 'Canon PG-810 Black Ink',     'price' => 950,   'stock' => 40, 'category_id' => 4, 'brand' => 'Canon'],
            ['name' => 'USB-C Hub 7-in-1',           'price' => 3500,  'stock' => 20, 'category_id' => 5, 'brand' => 'Generic'],
        ];

        foreach ($products as $p) {
            Product::create(array_merge($p, [
                'description' => 'High-quality ' . $p['name'] . ' for professional and home use.',
                'is_active'   => true,
            ]));
        }
    }
}
