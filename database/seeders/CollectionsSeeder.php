<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('collections')->insert([
            [
                'collection_id' => 1,
                'name' => 'Loft',
                'description' => 'Индустриальная коллекция с брутальными материалами и графичными формами.'
            ],
            [
                'collection_id' => 2,
                'name' => 'SoftGlow',
                'description' => 'Мягкие, уютные светильники с тёплым свечением и спокойной эстетикой.'
            ],
            [
                'collection_id' => 3,
                'name' => 'NordLight',
                'description' => 'Скандинавская минималистичная коллекция с чистыми линиями и светлыми оттенками.'
            ],
        ]);
    }
}
