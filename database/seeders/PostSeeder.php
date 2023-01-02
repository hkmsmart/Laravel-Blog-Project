<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<10; $i++){
            DB::table('posts')->insert([
                'title' => 'Başlık '.Str::random(10),
                'content' => 'İçerik '.Str::random(10),
                'category_id' => 2,
                'image'   => 'https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'slug' => 'slug-'.Str::random(10),
                'hit' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
