<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = Post::factory(300)->create();
        foreach ($post as $p) {
            Image::factory(1)->create(
                [
                    'imageable_id' => $p->id,
                    'imageable_type' => Post::class
                ]
            );
            $p->tags()->attach([
                //el que dice tags es el metodo de muchos a muchos que se hizo en el modelo
                rand(1, 4),
                rand(5, 8),
            ]);
        }
    }
}
