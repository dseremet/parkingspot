<?php
/**
 * Created by PhpStorm.
 * User: damirseremet
 * Date: 17/07/14
 * Time: 17:29
 */

class ParkingSpotSeed extends Seeder{

    private $numberOfColumns = 9;
    private $numberOfRows = 7;

    public function run()
    {
        $data = [];
        for($i=1; $i<=$this->numberOfRows; $i++)
        {
            for($j=1; $j<=$this->numberOfColumns; $j++ )
            {
                $data[] = ['position_x'=>$j, 'position_y'=>$i, 'free'=>true];
            }
        }

        DB::table('parking_spots')->truncate();
        DB::table('parking_spots')->insert($data);
    }

//
//    private $alpha = [
//        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','w','y','z'
//    ];
} 