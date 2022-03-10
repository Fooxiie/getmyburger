<?php

namespace Database\Seeders;

use App\Models\Burger;
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
        Burger::factory(1)->state([
            'name' => 'Little Django',
            'price' => 6.50
        ])->create();
        Burger::factory(1)->state([
            'name' => 'Mister Chancho',
            'price' => 7.50
        ])->create();
        Burger::factory(1)->state([
            'name' => 'Mc Aniche',
            'price' => 7.50
        ])->create();
        Burger::factory(1)->state([
            'name' => 'Azulero',
            'price' => 7.50
        ])->create();
        Burger::factory(1)->state([
            'name' => 'Mc Inion',
            'price' => 7.50
        ])->create();
        Burger::factory(1)->state([
            'name' => 'Don Papa',
            'price' => 7.50
        ])->create();
        Burger::factory(1)->state([
            'name' => 'Prince Of Quercia',
            'price' => 7.50
        ])->create();
        Burger::factory(1)->state([
            'name' => 'Big Ben',
            'price' => 7.50
        ])->create();
        Burger::factory(1)->state([
            'name' => 'Végétatout',
            'price' => 7.50
        ])->create();
    }
}
