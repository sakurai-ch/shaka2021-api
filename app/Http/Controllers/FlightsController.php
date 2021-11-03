<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function get(Request $request)
    {
        $params = Player::getPlayers();
        return response()->json([
            'message' => 'Players got successfully',
            'data' => $params,
        ], 200);
    }

    public function post(Request $request)
    {
        $flight = Flight::crateFlight($request);
        $player = Player::editPlayer($request->player_id);
        return response()->json([
            'message' => 'Flight created successfully',
            'data' => [ 
                'flight' => $flight,
                'player' => $player,
            ],
        ], 201);
    }
}
