<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Ahmet Hekim ',
            'email' => 'admin@admin.com ',
            'password' => bcrypt(123456),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
