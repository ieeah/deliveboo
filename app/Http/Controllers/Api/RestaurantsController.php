<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Type;

class RestaurantsController extends Controller
{
    public function index() {
        $restaurants = User::all();
        return response()->json($restaurants);
    }

    public function type(Request $request) {
        $id = $request->id;
        if ($id == 0) {
            $restaurants = User::all();
            return response()->json($restaurants);
        }
       
        $restaurants = Type::where('id', $id)->with('users')->get();
        return response()->json($restaurants);
    }

    public function restaurant($id) {
        $restaurant = User::where('id', $id)->get();
        return response()->json($restaurant);
    }
}
