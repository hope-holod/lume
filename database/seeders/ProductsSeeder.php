<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Настольная лампа Philips',
                'description' => 'Качественная LED лампа',
                'price' => 1990,
                'stock_quantity' => 10,
                'category_id' => 2,
                'brand_id' => 1,
            ],
            [
                'name' => 'Умная лампа Xiaomi',
                'description' => 'RGB лампа с управлением через приложение',
                'price' => 2490,
                'stock_quantity' => 15,
                'category_id' => 2,
                'brand_id' => 2,
            ],
        ]);
    }
}
