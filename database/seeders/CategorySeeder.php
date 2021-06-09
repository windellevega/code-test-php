<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Fantasy'],
            ['category_name' => 'Adventure'],
            ['category_name' => 'Romance'],
            ['category_name' => 'Contemporary'],
            ['category_name' => 'Dystopian'],
            ['category_name' => 'Mystery'],
            ['category_name' => 'Horror'],
            ['category_name' => 'Thriller'],
            ['category_name' => 'Paranormal'],
            ['category_name' => 'Historical Fiction'],
            ['category_name' => 'Science Fiction'],
            ['category_name' => 'Memoir'],
            ['category_name' => 'Cooking'],
            ['category_name' => 'Art'],
            ['category_name' => 'Personal'],
            ['category_name' => 'Development'],
            ['category_name' => 'Motivational'],
            ['category_name' => 'Health'],
            ['category_name' => 'History'],
            ['category_name' => 'Travel'],
            ['category_name' => 'Guide'],
            ['category_name' => 'Families & Relationships'],
            ['category_name' => 'Humor'],
            ['category_name' => 'Business'],
            ['category_name' => 'Children\'s'],
        ];

        Category::insert($categories);
    }
}
