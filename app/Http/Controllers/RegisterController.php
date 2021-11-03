<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $params = Player::createPlayer($request);
        return response()->json([
            'message' => 'Player created successfully',
            'data' => $params,
        ], 201);
    }
}
