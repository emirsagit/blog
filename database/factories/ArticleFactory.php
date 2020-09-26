<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'subtitle' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'description' => $this->faker->sentence,
            'thumbnail' => "https://bulma.io/images/placeholders/800x600.png",
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/73LopXka1ao" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ];
    }
}
