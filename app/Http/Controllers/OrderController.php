<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function getAll() 
    {
        return Order::all()->load('user')->toArray();
    }
}
