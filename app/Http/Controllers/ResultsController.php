<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Flight;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function get(Request $request)
    {
        $players = Player::getPlayers();
        $flights = Flight::getAllFlights();
        return response()->json([
            'message' => 'Results got successfully',
            'data' => [
                'players' => $players,
                'flights' => $flights,
            ]
        ], 200);
    }

    public function post(Request $request)
    {
        Flight::deleteFlights($request->flight_id);
        $player = Player::editPlayer($request->player_id);
        return response()->json([
            'message' => 'flight deleted successfully',
            'data' => [
                'player' => $player,
            ]
        ], 200);
    }
}
