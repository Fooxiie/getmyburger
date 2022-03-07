<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public static function getTodayOrders(): Collection|array
    {
        return Order::query()->where('created_at', '>', date('Y/m/d') . ' 00:00:00')->get();
    }

    public function burger(): BelongsTo
    {
        return $this->belongsTo(Burger::class);
    }

    public function totalPrice(): float
    {
        $burger = $this->burger;
        $price = $burger->price;
        $price = $price + (2.50 * $this->fries);
        return $price;
    }
}
