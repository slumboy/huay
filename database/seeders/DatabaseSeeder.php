<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('menu_setting')->insert(
            [
                'menu_name' => 'หน้าแรก',
                'menu_route' => 'home',
            ],
        );
        DB::table('menu_setting')->insert(
            [
                'menu_name' => 'จัดการร้านค้า',
                'menu_route' => 'shop',
            ],
        );
        DB::table('menu_setting')->insert(
            [
                'menu_name' => 'เพิ่มรายการลอตเตอรี่',
                'menu_route' => 'add-lottery',
            ]
        );
        DB::table('menu_setting')->insert(
            [
                'menu_name' => 'ลบข้อมูลเดิม',
                'menu_route' => 'delete-lottery',
            ]
        );
    }
}
