<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showIndex()
    {

        $parkingSpots = ParkingSpot::all()->toArray();
        $numberOfColumns = ParkingSpot::numberOfColumns();
        $numberOfRows = ParkingSpot::numberOfRows();

        $data = ['parkingSpots' => $parkingSpots, 'numberOfColumns' => $numberOfColumns, 'numberOfRows' => $numberOfRows];

        return View::make('hello', $data);
    }


    public function showAdmin()
    {

        $parkingSpots = ParkingSpot::all()->toArray();
        $numberOfColumns = ParkingSpot::numberOfColumns();
        $numberOfRows = ParkingSpot::numberOfRows();

        $data = ['parkingSpots' => $parkingSpots, 'numberOfColumns' => $numberOfColumns, 'numberOfRows' => $numberOfRows];

        return View::make('admin', $data);
    }

    public function changeSlot()
    {
        $slotId = Input::get('slotId');

        return Response::json(array('free' => ParkingSpot::changeSlotStatus($slotId)));
    }
}
