<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'IPhone 12 Pro Max',
                'slug' => 'iphone-12-pro-max',
                'origin_price' => 30000000,
                'sale_price' => 25000000,
                'discount_percent' => 17,
                'content' => 'IPhone 12 Pro Max có màn hình OLED 6.7 inch, camera sau 3 ống kính, bộ nhớ trong 128GB.',
                'user_id' => 1,
                'category_id' => 1,
                'status' => 1,
            ],
            [
                'name' => 'IPhone 12 Pro Max',
                'slug' => 'iphone-12-pro-max',
                'origin_price' => 30000000,
                'sale_price' => 3000000,
                'discount_percent' => 90,
                'content' => 'IPhone 12 Pro Max có màn hình OLED 6.7 inch, camera sau 3 ống kính, bộ nhớ trong 128GB.',
                'user_id' => 1,
                'category_id' => 1,
                'status' => -1,
            ],
        ]);
    }
}
