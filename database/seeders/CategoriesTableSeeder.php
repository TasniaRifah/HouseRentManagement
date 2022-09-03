<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'id' => '1',
            'categories_name' => 'Male'

        ]);

        Category::create([
            'id' => '2',
            'categories_name' => 'Female'
        ]);

        Category::create([
            'id' => '3',
            'categories_name' => 'Familly'
        ]);
    }
}
