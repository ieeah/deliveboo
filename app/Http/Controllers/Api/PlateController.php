<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plate;

class PlateController extends Controller
{
    public function index($id) {
        $plates = Plate::where('user_id', $id)->get();
        return response()->json($plates);
    }
}
