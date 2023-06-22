<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AdminUser::factory(1)->create();
        \App\Models\User::factory(30)->create();

        DB::table('categories')->insert([
            'c_code' => 'C-APPLE',
            'c_name' => 'Apple',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'c_code' => 'C-SAMSUNG',
            'c_name' => 'Samsung',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'c_code' => 'C-MI',
            'c_name' => 'Mi',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'c_code' => 'C-REDMI',
            'c_name' => 'Redmi',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'c_code' => 'C-OPPO',
            'c_name' => 'Oppo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'c_code' => 'C-VIVO',
            'c_name' => 'Vivo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert(['category_code' => 'C-APPLE', 'title' => 'IPhone 13', 'image' => '', 'color' => 'Red, Blue', 'description' => 'This is iphone 13. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-MI', 'title' => 'Mi 6', 'image' => '', 'color' => 'White, Black', 'description' => 'This is iphone Mi 6. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-APPLE', 'title' => 'IPhone 7 Plus', 'image' => '', 'color' => 'Red, Black', 'description' => 'This is iphone 7 Plus. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-OPPO', 'title' => 'Oppo f3', 'image' => '', 'color' => 'White, Red', 'description' => 'This is Oppo f3. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-REDMI', 'title' => 'Redmi 10', 'image' => '', 'color' => 'Black, Blue', 'description' => 'This is Redmi 10. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-REDMI', 'title' => 'Redmi 7 pro', 'image' => '', 'color' => 'Black, Blue', 'description' => 'This is Redmi 7 pro. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-VIVO', 'title' => 'Vivo V3', 'image' => '', 'color' => 'Black, Blue', 'description' => 'This is Vivo V3. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-APPLE', 'title' => 'IPhone X', 'image' => '', 'color' => 'Red, Blue', 'description' => 'This is iphone X. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-APPLE', 'title' => 'IPhone 11 Pro', 'image' => '', 'color' => 'Red, Black', 'description' => 'This is iphone 11 pro. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-MI', 'title' => 'MI 9', 'image' => '', 'color' => 'White, Black', 'description' => 'This is Mi 9. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-SAMSUNG', 'title' => 'Galaxy Prime', 'image' => '', 'color' => 'White, Black', 'description' => 'This is Galaxy Prime. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-REDMI', 'title' => 'Redmi 8', 'image' => '', 'color' => 'White, Blue', 'description' => 'This is Redmi 8. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-SAMSUNG', 'title' => 'A 11', 'image' => '', 'color' => 'Black, Blue', 'description' => 'This is Samsung A11. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-OPPO', 'title' => 'Oppo f6', 'image' => '', 'color' => 'Black, White', 'description' => 'This is Oppo f6. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('products')->insert(['category_code' => 'C-VIVO', 'title' => 'Vivo V6', 'image' => '', 'color' => 'Red, Blue', 'description' => 'This is Vivo V6. You can buy it.', 'created_at' => now(), 'updated_at' => now()]);
    }
}
