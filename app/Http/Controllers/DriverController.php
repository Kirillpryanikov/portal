<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Trip;
use App\TripCall;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    //get drivers list for menu
    public function getDrivers(){
        $drivers = Driver::select('_id', 'full_name', 'driver_status')->get()->toArray();
        dd($drivers);
        return view('menu.drivers_list', ['drivers'=>$drivers]);
    }

    //get drivers data for personal menu
    public function getDriverMenu($id){
        $driver = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();
        return view('menu.personal_menu', ['driver'=>$driver]);
    }

    //get data for booking and missed pages
    public function getBooking($id){
        $trips = Trip::all()->toArray();
        $trip_calls = TripCall::all()->toArray();

        $misseds = [];
        $bookings = [];

        foreach ($trips as $trip){
            if(isset($trip['driver_id']) && $trip['driver_id'] == $id){
                $bookings[] = [
                                '_id'           => isset($trip['_id'])?$trip['_id']:'',
                                'driver_id'     => isset($trip['driver_id'])?$trip['driver_id']:'',
                                'trip_no'       => isset($trip['trip_no'])?$trip['trip_no']:'',
                                'created_at'    => isset($trip['created_at'])?$trip['created_at']:'',
                                'status'        => isset($trip['status'])?$trip['status']:'',
                            ];
            }
        }

        foreach ($trip_calls as $trip_call){
            if(isset($trip_call['driver_id']) && $trip_call['driver_id'] == $id){
                $trip_no = '';
                foreach ($bookings as $booking){
                    if($booking['_id'] == $trip_call['trip_id']){
                        $trip_no = $booking['trip_no'];
                        break 1;
                    }
                }

                $misseds[] = [
                    '_id'           => isset($trip_call['_id'])?$trip_call['_id']:'',
                    'driver_id'     => isset($trip_call['driver_id'])?$trip_call['driver_id']:'',
                    'trip_no'       => $trip_no,
                    'created_at'    => isset($trip_call['created_at'])?$trip_call['created_at']:'',
                    'status'        => isset($trip_call['status'])?$trip_call['status']:'',
                ];
            }
        }

        return view('menu.options.bookings', ['bookings'=>$bookings, 'misseds'=>$misseds, 'driver_id'=>$id]);
    }

}
