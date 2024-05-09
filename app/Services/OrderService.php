<?php

namespace App\Services;

use App\Models\Order;
use Auth;
use App\Services\SlugService;

class OrderService
{
    // get all orders
    public static function orders()
    {
        $orders = Order::all();

        return $orders;
    }

    // store new order
    public static function store($validated)
    {
        $user = Auth::user();
        $slugData = $user->name.'-'.$validated->name;
        $slug = SlugService::make($slugData);

        $orderData = [
            'user_id' => $user->id,
        ];

        $order = Order::create($orderData);

        
    }

    // count the chirps
    public static function count()
    {
        $count = Order::count();

        return $count;
    }
}