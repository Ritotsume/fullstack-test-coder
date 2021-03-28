<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Nome do model ao qual esse factory corresponde.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define o estado padrão do model.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence($nbWords = 4, $variableNbWords = true);
        return [
            'title' => $title,
            'excerpt' => $this->faker->text($maxNbChars = 200),
            'body' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'image' => 'https://source.unsplash.com/900x600/?abstract,nature,watter,animals',
            'slug' => \Helper::slugify($title),
            'meta_description' => $this->faker->text($maxNbChars = 200),
            'meta_keywords' => implode(',', $this->faker->words($nb = 6, $asText = false)),
            'status' => 'PUBLISHED',
            'created_at' => \Carbon\Carbon::now()
        ];
    }
}
