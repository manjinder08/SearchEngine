<?php

namespace Database\Factories;

use App\Models\book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         =>      $this->faker->name(),
            'edition'      =>      $this->faker->randomDigit(0,9),
            'price'        =>      $this->faker->randomDigit(3),
            'Author_id'    =>      function () {
                                        return Author::inRandomOrder()->first()->id;
                                    }
        ];
    }
}
