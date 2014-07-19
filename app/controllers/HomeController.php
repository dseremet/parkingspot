<?php

class HomeController extends BaseController
{
    public function showIndex()
    {
        // dd(Request::server('HTTP_HOST'));

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
