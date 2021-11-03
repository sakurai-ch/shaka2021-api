<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public static function createPlayer($request)
    {
        $player = Player::create([
            'name' => $request->player_name,
            'has_xcp' => $request->has_xcp,
            'glider_name' => $request->glider_name,
            'has_kingpost' => $request->has_kingpost,
            'max_time_point' => 0,
            'max_landing_point' => 0,
            'max_target_point' => 0,
            'max_pylon1_point' => 0,
            'max_pylon2_point' => 0,
        ]);
        return $player;
    }

    public static function editPlayer($playerId)
    {
        $max_time_point = 0;
        $max_landing_point = 0;
        $max_target_point = 0;
        $max_pylon1_point = 0;
        $max_pylon2_point = 0;

        $flights = Flight::getFlights($playerId);
        if($flights != null) {
            foreach($flights as $flight) {
                if($flight->time_point > $max_time_point) {
                    $max_time_point = $flight->time_point;
                }
                if($flight->landing_point > $max_landing_point) {
                    $max_landing_point = $flight->landing_point;
                }
                if($flight->target_point > $max_target_point) {
                    $max_target_point = $flight->target_point;
                }
                if($flight->pylon1_point > $max_pylon1_point) {
                    $max_pylon1_point = $flight->pylon1_point;
                }
                if($flight->pylon2_point > $max_pylon2_point) {
                    $max_pylon2_point = $flight->pylon2_point;
                }
            }
        }

        Player::where('id', $playerId)
            ->update([
                'max_time_point' => $max_time_point,
                'max_landing_point' => $max_landing_point,
                'max_target_point' => $max_target_point,
                'max_pylon1_point' => $max_pylon1_point,
                'max_pylon2_point' => $max_pylon2_point,
            ]);
        $updatedPlayer = Player::getPlayer($playerId);
        return $updatedPlayer;
    }

    public static function getPlayers()
    {
        $players = Player::all();
        return $players;
    }

    public static function getPlayer($player_id)
    {
        $player = Player::find($player_id);
        return $player;
    }

    public static function deletePlayer($playerId)
    {
        Player::where('id', $playerId)
            ->delete();
    }

    protected $fillable = [
        'name',
        'has_xcp',
        'glider_name',
        'has_kingpost',
        'max_time_point',
        'max_landing_point',
        'max_target_point',
        'max_pylon1_point',
        'max_pylon2_point',
    ];
}

