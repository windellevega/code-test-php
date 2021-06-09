<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
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
            'title' => $this->faker->text(20),
            'isbn' => $this->faker->isbn10(),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'year_published' => $this->faker->year(),
            'category_id' => rand(1, Category::count())
        ];
    }
}
