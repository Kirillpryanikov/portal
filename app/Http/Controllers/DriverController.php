<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Trip;
use App\TripCall;
use App\Wallet;
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
        $driver = Driver::select('_id', 'full_name', 'address')->where('_id', $id)->first()->toArray();
        return view('menu.personal_menu', ['driver'=>$driver]);
    }

    //get data for booking and missed pages
    public function getBooking($id){
        $trips = Trip::all()->toArray();
        $trip_calls = TripCall::all()->toArray();
        $driver = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();

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

        return view('menu.options.bookings', ['bookings'=>$bookings, 'misseds'=>$misseds, 'driver'=>$driver]);
    }

    //get driver profile
    public function getDriverProfile($id){
        $driver = Driver::where('_id', $id)->first()->toArray();
        return view('menu.options.profile_page', ['driver'=>$driver]);
    }

    //get booking detail
    public function getBookingDetail($id){
        $details = Trip::where('_id', $id)->first()->toArray();

        return view('menu.options.booking_detail',['details' => $details]);
    }

    //get missed detail
    public function getMissedDetail($id){
        $details = TripCall::where('_id', $id)->first()->toArray();

        return view('menu.options.booking_detail',['details' => $details]);
    }

    // get wallet data
    public function getWallets($id){
        $wallets_all = Wallet::all()->toArray();
        $driver = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();

        $wallets_out = [];

        foreach ($wallets_all as $wallet) {
            if (isset($wallet['driver_id']) && $wallet['driver_id'] == $id) {
                $wallets_out[] = [
                    '_id' => isset($wallet['_id']) ? $wallet['_id'] : '',
                    'driver_id' => isset($wallet['driver_id']) ? $wallet['driver_id'] : '',
                    'trip_no' => isset($wallet['trip_no']) ? $wallet['trip_no'] : '',
                    'created_at' => isset($wallet['created_at']) ? $wallet['created_at'] : '',
                    'title' => isset($wallet['title']) ? $wallet['title'] : '',
                    'comments' => isset($wallet['comments']) ? $wallet['comments'] : '',
                    'balance' => isset($wallet['balance']) ? $wallet['balance'] : '',
                    'total' => isset($wallet['total']) ? $wallet['total'] : '',
                    'trip_status' => isset($wallet['trip_status']) ? $wallet['trip_status'] : '',
                    'transfer' => isset($wallet['transfer']) ? $wallet['transfer'] : '',
                    'last_received_via' => isset($wallet['last_received_via']) ? $wallet['last_received_via'] : '',
                ];
            }
        }

        return view('menu.options.wallets',['wallets' => $wallets_out, 'driver'=>$driver]);
    }

    //get Complaints Filed data
    public function getComplaintsFiled($id){
        $complaints_filed_all = Trip::all()->toArray();
        $driver = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();

        $complaints_fileds = [];

        foreach ($complaints_filed_all as $complaints) {
            if (isset($complaints['driver_id']) && $complaints['driver_id'] == $id) {
                $complaints_filed[] = [
                    '_id' => isset($complaints['_id']) ? $complaints['_id'] : '',
                    'driver_id' => isset($complaints['driver_id']) ? $complaints['driver_id'] : '',
                    'trip_no' => isset($complaints['trip_no']) ? $complaints['trip_no'] : '',
                    'created_at' => isset($complaints['created_at']) ? $complaints['created_at'] : '',
                    'status' => isset($complaints['status']) ? $complaints['status'] : '',
                ];
            }
        }

        return view('menu.options.complaints_filed',['complaints_fileds' => $complaints_fileds]);
    }

    // get Statements data
    public function getStatements($id){
        $statements_all = Trip::all()->toArray();
        $driver = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();

        $statements = [];

        foreach ($statements_all as $statement) {
            if (isset($statement['driver_id']) && $statement['driver_id'] == $id) {
                $statements[] = [
                    '_id' => isset($statement['_id']) ? $statement['_id'] : '',
                    'driver_id' => isset($statement['driver_id']) ? $statement['driver_id'] : '',
                    'trip_no' => isset($statement['trip_no']) ? $statement['trip_no'] : '',
                    'created_at' => isset($statement['created_at']) ? $statement['created_at'] : '',
                    'status' => isset($statement['status']) ? $statement['status'] : '',
                ];
            }
        }

        return view('menu.options.statements',['statements' => $statements]);
    }

}
