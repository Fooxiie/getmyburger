<?php

namespace Database\Seeders;

use App\Models\Order;
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
        Order::factory(5)->create();
        Order::factory(5)->state([
            'created_at' => '2022/03/06 23:59:00'
        ])->create();
    }
}
