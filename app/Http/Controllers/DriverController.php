<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    //get drivers list for menu
    public function getDrivers(){
        $drivers = Driver::select('_id', 'full_name', 'driver_status')->get()->toArray();
        return view('menu.drivers_list', ['drivers'=>$drivers]);
    }

    //get drivers data for personal menu
    public function getDriverMenu($id){
        $driver = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();
        return view('menu.personal_menu', ['driver'=>$driver]);
    }


}
