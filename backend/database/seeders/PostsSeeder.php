<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Post::count() == 0)
        {
            // Não modifique essa inserção se pretende realizar algum test com as classes de testes
            DB::table('posts')->insert([
                'title' => 'Lorem ipsum dolor',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat tortor, vehicula quis efficitur et, imperdiet non lacus. Sed quis porta magna.',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat tortor, vehicula quis efficitur et, imperdiet non lacus. Sed quis porta magna. Etiam accumsan euismod enim quis euismod. Mauris nisi lorem, tincidunt non pulvinar eu, fermentum quis nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
                'image' => 'https://source.unsplash.com/900x600/?abstract',
                'slug' => \Helper::slugify('Lorem ipsum dolor'),
                'meta_description' => 'Lorem ipsum dolor META DESCRIPTION',
                'meta_keywords' => 'lorem, ipsum, dolor, meta, keywords',
                'status' => 'PUBLISHED',
                'created_at' => date('Y-m-d H:i:s')
            ]);

            Post::factory()->count(3)->create();
        }
    }
}
