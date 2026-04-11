<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_id' => 1,
                'name' => 'Потолочные',
                'description' => 'Светильники, устанавливаемые на потолок: подвесные, накладные, точечные.'
            ],
            [
                'category_id' => 2,
                'name' => 'Настенные',
                'description' => 'Бра и другие светильники, размещаемые на стенах.'
            ],
            [
                'category_id' => 3,
                'name' => 'Настольные',
                'description' => 'Лампы для рабочих столов, прикроватных тумб и декоративного освещения.'
            ],
            [
                'category_id' => 4,
                'name' => 'Напольные',
                'description' => 'Торшеры и другие напольные светильники для зонального освещения.'
            ],
        ]);
    }
}
