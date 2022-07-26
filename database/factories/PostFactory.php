<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=fake()->paragraph(1);
        $slug=Str::slug($title);
        return [
            'title'=>$title,
            'body'=>fake()->paragraph(3),
            'slug'=>$slug,
            'counts'=>random_int(0,20),
            'user_id'=>random_int(1,20),
            'category_id'=>random_int(1,5),
        ];
    }
}
