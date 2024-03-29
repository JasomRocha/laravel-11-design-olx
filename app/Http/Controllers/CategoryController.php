<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $r): JsonResponse{
        $categories = Category::all();
        return response()->json(['data'=> $categories]);
    }
}
