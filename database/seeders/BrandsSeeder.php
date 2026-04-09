<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('brands')->insert([
            ['brand_name' => 'Philips'],
            ['brand_name' => 'Xiaomi'],
            ['brand_name' => 'Gauss'],
        ]);
    }
}
