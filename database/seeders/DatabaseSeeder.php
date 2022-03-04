<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->state([
            'name' => 'admin',
            'password' => Hash::make('adminadmin'),
            'email' => 'admin@gmail.com'
        ])->create();
        \App\Models\Burger::factory(1)->state([
           'name' => 'McInion',
        ])->create();
        \App\Models\Burger::factory(1)->state([
            'name' => 'Prince',
        ])->create();
        \App\Models\Burger::factory(1)->state([
            'name' => 'Azulero',
        ])->create();
        \App\Models\Burger::factory(5)->create();
        // \App\Models\User::factory(10)->create();
    }
}
