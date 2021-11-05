<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayersTableSeeder extends Seeder
{
    public function run()
    {
        $params =
            [
                [
                    'name' => '齋藤 和美',
                    'has_xcp' => false,
                    'glider_name' => 'ファルコン4',
                    'has_kingpost' => false,
                ],
                [
                    'name' => '徳永 信資',
                    'has_xcp' => false,
                    'glider_name' => 'AIR ATOS-S',
                    'has_kingpost' => true,
                ],
                [
                    'name' => '浅田 吉治',
                    'has_xcp' => false,
                    'glider_name' => 'ラミナールEazy',
                    'has_kingpost' => false,
                ],
                [
                    'name' => '只見 繁政',
                    'has_xcp' => false,
                    'glider_name' => 'ファルコン４',
                    'has_kingpost' => false,
                ],
                [
                    'name' => '斉藤 真紀',
                    'has_xcp' => false,
                    'glider_name' => 'orbiter',
                    'has_kingpost' => false,
                ],
                [
                    'name' => '中嶋 健太',
                    'has_xcp' => false,
                    'glider_name' => 'Sport2',
                    'has_kingpost' => false,
                ],
            ];

        foreach ($params as $param) {
            $param['max_time_point'] = 0;
            $param['max_landing_point'] = 0;
            $param['max_target_point'] = 0;
            $param['max_pylon1_point'] = 0;
            $param['max_pylon2_point'] = 0;
            Player::insert($param);
        }
    }
}
