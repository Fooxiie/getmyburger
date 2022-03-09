<?php

namespace Database\Factories;

use App\Models\Burger;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'burger_id' => Burger::factory(),
            'customer' => $this->faker->name,
            'drink' => $this->faker->city,
            'fries' => $this->faker->numberBetween(0, 5),
            'crispy' => $this->faker->numberBetween(0, 2)
        ];
    }
}
