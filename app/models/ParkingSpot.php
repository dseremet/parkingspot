<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ParkingSpot extends Eloquent
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parking_spots';

    public static function numberOfColumns()
    {
        return ParkingSpot::max("position_x");
    }

    public static function numberOfRows()
    {
        return ParkingSpot::max("position_y");
    }


    public static function changeSlotStatus($slotId)
    {
        $free = DB::table("parking_spots")->select("free")->where("id", '=', $slotId)->first()->free;
        DB::table("parking_spots")->where("id", '=', $slotId)->update(['free' => !$free]);
        return !$free;
    }
}
