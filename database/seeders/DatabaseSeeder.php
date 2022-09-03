<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            // CategoriesTableSeeder::class,
            // ProductsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            
        ]);

       
        }

    }

