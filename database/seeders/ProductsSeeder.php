<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Lume Arcus Pendant',
                'price' => 420,
                'category_id' => 1, // Потолочные
                'collection_id' => 3, // NordLight
                'description' => 'Создаёт атмосферу спокойной роскоши. Идеален для современных кухонь и гостиных.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'NordLight Sphere Halo',
                'price' => 560,
                'category_id' => 1,
                'collection_id' => 3,
                'description' => 'Чистая геометрия и скандинавская простота. Подходит для столовых зон.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'LoftPro Iron Beam',
                'price' => 310,
                'category_id' => 1,
                'collection_id' => 1, // Loft
                'description' => 'Создаёт акцентный свет и подчёркивает фактуру интерьера.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'Lume Atelier Desk One',
                'price' => 260,
                'category_id' => 3, // Настольные
                'collection_id' => 3,
                'description' => 'Идеальна для рабочего пространства. Даёт мягкий направленный свет.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'SoftGlow Essence Lamp',
                'price' => 180,
                'category_id' => 3,
                'collection_id' => 2, // SoftGlow
                'description' => 'Создаёт уютную атмосферу и подчёркивает спокойный интерьер.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'LoftPro Copper Edge',
                'price' => 320,
                'category_id' => 3,
                'collection_id' => 1,
                'description' => 'Добавляет интерьеру характер и глубину.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'Lume Wall Arc',
                'price' => 240,
                'category_id' => 2, // Настенные
                'collection_id' => 3,
                'description' => 'Идеально для коридоров и спален. Создаёт спокойный акцент.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'SoftGlow Wall Pure',
                'price' => 190,
                'category_id' => 2,
                'collection_id' => 2,
                'description' => 'Добавляет интерьеру лёгкость и чистоту.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'LoftPro Wall Forge',
                'price' => 280,
                'category_id' => 2,
                'collection_id' => 1,
                'description' => 'Создаёт выразительный световой акцент.',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'Lume Aurelia Pendant',
                'price' => 620,
                'category_id' => 1,
                'collection_id' => 3,
                'description' => 'Добавляет интерьеру роскошь и мягкое тёплое освещение.',
                'stock_quantity' => 10,
            ],
        ]);
    }
}
