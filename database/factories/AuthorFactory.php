<?php

namespace Database\Factories;

use App\Models\author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'       =>      $this->faker->name(),
            'email'      =>      $this->faker->unique()->safeEmail(),
            'contact'   =>       $this->faker->phoneNumber(),
        ];
    }
}
