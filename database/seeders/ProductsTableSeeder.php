<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::create([
        //     'title'=>'dress',
        //       'text'=>'fgf hgfhg hgh hjgh ',
        //       'categories_id'=>'5',
  
        //  ]);
        Product::factory(50)->create();
    }
}
