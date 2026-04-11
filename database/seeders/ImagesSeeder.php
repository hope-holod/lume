<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('images')->insert([
            [
                'product_id' => 1,
                'image' => 'products_assets/product1.jpg',
            ],
            [
                'product_id' => 2,
                'image' => 'products_assets/product2.jpg',
            ],
            [
                'product_id' => 3,
                'image' => 'products_assets/product3.jpg',
            ],
            [
                'product_id' => 4,
                'image' => 'products_assets/product4.jpg',
            ],
            [
                'product_id' => 5,
                'image' => 'products_assets/product5.jpg',
            ],
            [
                'product_id' => 6,
                'image' => 'products_assets/product6.jpg',
            ],
            [
                'product_id' => 7,
                'image' => 'products_assets/product7.jpg',
            ],
            [
                'product_id' => 8,
                'image' => 'products_assets/product8.jpg',
            ],
            [
                'product_id' => 9,
                'image' => 'products_assets/product9.jpg',
            ],
            [
                'product_id' => 10,
                'image' => 'products_assets/product10.jpg',
            ],
        ]);
    }
}
