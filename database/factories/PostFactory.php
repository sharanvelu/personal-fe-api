<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
            'status' => $this->faker->word,
            'field_float' => $this->faker->randomNumber(2),
            'field_integer' => $this->faker->randomNumber(0),
            'field_bool' => $this->faker->boolean,
            'field_date' => $this->faker->date,
            'field_timestamp' => $this->faker->dateTime,
        ];
    }
}
