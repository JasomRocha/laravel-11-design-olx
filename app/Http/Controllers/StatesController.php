<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\State;

class StatesController extends Controller
{
    public function index(Request $r): JsonResponse{
        $states = State::all();
        return response()->json(['data'=> $states]);
    }
}
