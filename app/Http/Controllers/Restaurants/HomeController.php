<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function edit_profile() {
        $user = Auth::user();
        return view('restaurants.public', compact('user'));
    }

    public function update_profile() {

    }
}
