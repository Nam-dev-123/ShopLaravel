<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Điện thoại',
                'slug' => 'dien-thoai',
                'parent_id' => null,
                'depth' => 1,
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop',
                'parent_id' => null,
                'depth' => 1,
            ]
        ]);
    }
}
