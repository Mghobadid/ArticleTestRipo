<?php

namespace Database\Factories;

use App\Models\ArticleLike;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArticleLikeFactory extends Factory
{
    protected $model = ArticleLike::class;

    public function definition()
    {
        return [
            'article_id' => $this->faker->randomNumber(),
            'created_at' =>$this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' =>$this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
