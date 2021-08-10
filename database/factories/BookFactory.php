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
            'book_name'         =>      $this->faker->text(20),
            'price'        =>      $this->faker->randomDigit(),
            'Author_id'    =>      function () {
                                        return Author::inRandomOrder()->first()->id;
                                    }
        ];
    }
}
