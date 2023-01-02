<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Array('Genel','Eğlence','Bilişim','Gezi','Teknoloji','Sağlık','Spor','Günlük Yaşam');
        foreach ($categories as $c){
            DB::table('categories')->insert([
                'name' => $c,
                'slug' => Str::slug($c,'-'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
