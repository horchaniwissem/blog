<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->catchPhrase;
        $slug = Str::slug($title, "-");
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->paragraph,
            'active' => $this->faker->boolean,
            'draft' => $this->faker->boolean,
        ];
    }
}
