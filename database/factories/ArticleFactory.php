<?php

namespace Database\Factories;

use App\Enums\ArticleTypeEnum;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'type' => ArticleTypeEnum::cases()[array_rand(ArticleTypeEnum::cases())]->value,
            'view_count'=>$this->faker->randomNumber(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
