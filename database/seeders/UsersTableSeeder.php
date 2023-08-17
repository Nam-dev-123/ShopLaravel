<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use mysql_xdevapi\Table;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'email' => 'nguyenvana@gmail.com',
                'address' => '123 Đường ABC, Phường XYZ, Quận 1, TP. Hồ Chí Minh',
                'password' => bcrypt('123456'),
                'phone' => '0983562383',
                'role' => 1,
            ],
            [
                'name' => 'Nguyễn Văn B',
                'email' => 'nguyenvanb@gmail.com',
                'address' => '123 Đường ABC, Phường XYZ, Quận 1, TP. Hồ Chí Minh',
                'password' => bcrypt('123456'),
                'phone' => '098462383',
                'role' => 2,
            ]
        ]);
    }
}
