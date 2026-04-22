<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class UpdateProductCharacteristicsSeeder extends Seeder
{
    public function run()
    {
        Product::where('product_id', 1)->update([
            'material' => 'Металл',
            'color' => 'Черный',
            'style' => 'Современный',
            'size' => '30x20 см',
            'power' => '12W',
        ]);

        Product::where('product_id', 2)->update([
            'material' => 'Стекло',
            'color' => 'Белый',
            'style' => 'Минимализм',
            'size' => '25x25 см',
            'power' => '8W',
        ]);

        Product::where('product_id', 3)->update([
            'material' => 'Дерево',
            'color' => 'Натуральный дуб',
            'style' => 'Лофт',
            'size' => '40x15 см',
            'power' => '15W',
        ]);

        Product::where('product_id', 4)->update([
            'material' => 'Хрусталь',
            'color' => 'Белый',
            'style' => 'Классический',
            'size' => '35x35 см',
            'power' => '40W',
        ]);

        Product::where('product_id', 5)->update([
            'material' => 'Алюминий',
            'color' => 'Серебристый',
            'style' => 'Лофт',
            'size' => '50x10 см',
            'power' => '24W',
        ]);

        Product::where('product_id', 6)->update([
            'material' => 'Текстиль',
            'color' => 'Черный',
            'style' => 'Минимализм',
            'size' => '30x30 см',
            'power' => '10W',
        ]);

        Product::where('product_id', 7)->update([
            'material' => 'Пластик',
            'color' => 'Серый',
            'style' => 'Современный',
            'size' => '20x20 см',
            'power' => '6W',
        ]);

        Product::where('product_id', 8)->update([
            'material' => 'Медь',
            'color' => 'Золотистый',
            'style' => 'Классический',
            'size' => '25x40 см',
            'power' => '18W',
        ]);

        Product::where('product_id', 9)->update([
            'material' => 'Бетон',
            'color' => 'Серый',
            'style' => 'Минимализм',
            'size' => '45x15 см',
            'power' => '20W',
        ]);

        Product::where('product_id', 10)->update([
            'material' => 'Бамбук',
            'color' => 'Белый',
            'style' => 'Классический',
            'size' => '35x20 см',
            'power' => '9W',
        ]);
    }
}
