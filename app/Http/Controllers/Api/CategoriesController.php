<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;

class CategoriesController extends Controller
{
    public function index() {
        $cats = Type::all();return response()->json($cats);
    }
}
