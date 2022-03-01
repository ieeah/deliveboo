<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function edit_profile() {
        return view('restaurants.public');
    }

    public function update_profile() {
        
    }
}
