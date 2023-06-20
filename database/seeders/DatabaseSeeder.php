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
    }
}
