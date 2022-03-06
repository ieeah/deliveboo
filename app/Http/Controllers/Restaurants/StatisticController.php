<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class StatisticController extends Controller
{
    public function index() {

        $orders = Order::where('user_id', Auth::user()->id)->get();
        
        return view('restaurants.statistic', compact('orders'));
    }
    
    public function indexOrder() {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('restaurants.orders', compact('orders'));
    }





}
