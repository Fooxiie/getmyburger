<?php

use App\Models\Burger;
use Tests\TestCase;

class BurgerTest extends TestCase
{

    /**
     * Test si on a bien plusiurs burgers en base
     * @return void
     */
    public function test_burgers_exist_in_db() {
        $count = Burger::all();
        $this->assertTrue($count->count() > 0);
    }

    public function test_burger_have_good_price() {
        $min = 1;
        $max = 7.50;
        foreach (Burger::all() as $burger) {
            $this->assertTrue($burger->price < $max,
                $burger->price . ' :: ' . $max);
            $this->assertTrue($burger->price > $min,
                $burger->price . ' :: ' . $min);
        }
    }
}
