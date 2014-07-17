<?php
/**
 * Created by PhpStorm.
 * User: damirseremet
 * Date: 17/07/14
 * Time: 17:29
 */

class ParkingSpotSeed extends Seeder{

    private $numberOfColumns = 6;
    private $numberOfRows = 6;

    public function run()
    {
        $data = [];
        for($i=1; $i<=$this->numberOfColumns; $i++)
        {
            for($j=1; $j<=$this->numberOfRows; $j++ )
            {
                $data[] = ['position_x'=>$j, 'position_y'=>$i, 'free'=>true];
            }
        }


        DB::table('parking_spots')->insert($data);
    }

//
//    private $alpha = [
//        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','w','y','z'
//    ];
} 