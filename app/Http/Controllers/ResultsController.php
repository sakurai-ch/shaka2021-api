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

    public function deleteFlight(Request $request)
    {
        Flight::deleteFlight($request->flight_id);
        $player = Player::editPlayer($request->player_id);
        return response()->json([
            'message' => 'flight deleted successfully',
            'data' => [
                'player' => $player,
            ]
        ], 200);
    }

    public function deletePlayer(Request $request)
    {
        Flight::deleteFlights($request->player_id);
        Player::deletePlayer($request->player_id);
        return response()->json([
            'message' => 'player deleted successfully',
        ], 200);
    }
}
