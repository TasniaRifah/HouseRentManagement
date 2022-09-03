<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'id' => '1',
            'role_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Admin'

        ]);

        User::create([
            'id' => '2',
            'role_id' => '2',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Editor'
        ]);

        User::create([
            'id' => '3',
            'role_id' => '3',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Customer'
        ]);
    
        User::factory(20)->create();

    }
}
