<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public static function crateFlight($request)
    {
        $player = Player::getPlayer($request->player_id);
        if($player->has_xcp || $player->has_kingpost) {
            $time = min( max($request->time, 20), 240);
            $time_point =  round( 10 + 10 * log( ($time/30), 2) ); 
        } else {
            $time = min( max($request->time, 10), 120);
            $time_point =  round( 10 + 10 * log( ($time/15), 2) ); 
        }

        $landing_point = (int)($request->landing);
        
        $target_point = ( $request->target ? 10 : 0 );

        $pylon1 = ( preg_match('/大/', $request->pylon) == 1 );
        $pylon1_point = ($pylon1 ? 5 : 0);

        $pylon2 = ( preg_match('/門/', $request->pylon) == 1 );
        $pylon2_point = ($pylon2 ? 5 : 0);

        $createdFlight = Flight::create([
            'player_id' => $request->player_id,
            'time' => $request->time,
            'landing' => $request->landing,
            'target' => $request->target,
            'pylon1' => $pylon1,
            'pylon2' => $pylon2,
            'time_point' => $time_point,
            'landing_point' => $landing_point,
            'target_point' => $target_point,
            'pylon1_point' => $pylon1_point,
            'pylon2_point' => $pylon2_point,
        ]);
        return $createdFlight;
    }
    
    public static function getAllFlights()
    {
        $flights = Flight::all();
        return $flights;
    }

    public static function getFlights($playerId)
    {
        $flights = Flight::where('player_id', $playerId)
            ->get();
        return $flights;
    }

    public static function deleteFlights($flightId)
    {
        Flight::where('id', $flightId)
            ->delete();
    }

    protected $fillable = [
        'player_id',
        'time',
        'landing',
        'target',
        'pylon1',
        'pylon2',
        'time_point',
        'landing_point',
        'target_point',
        'pylon1_point',
        'pylon2_point',
    ];
}
