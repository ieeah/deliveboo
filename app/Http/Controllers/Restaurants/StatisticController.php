<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class StatisticController extends Controller
{
    public function index() {

        $orders = Order::all();


        return view('restaurants.statistic', compact('orders'));
    }
}
