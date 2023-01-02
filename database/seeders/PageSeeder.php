<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = Array('Hakkımızda','Kariyer','Vizyonumuz','Misyonumuz');
        $count = 0;
        foreach ($pages as $p){
            $count++;
            DB::table('pages')->insert([
                'title'   => $p,
                'order'   => $count,
                'slug'    => Str::slug($p,'-'),
                'image'   => 'https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                              been the industry s standard dummy text ever since the 1500s, when an unknown printer took
                              a galley of type and scrambled it to make a type specimen book. It has survived not only
                              five centuries, but also the leap into electronic typesetting, remaining essentially
                              unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                              Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                              PageMaker including versions of Lorem Ipsum.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
