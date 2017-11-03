<?php

namespace App\Http\Controllers;

use App\City;
use App\ComplaintFiled;
use App\Driver;
use App\Invoice;
use App\Mail\SendMail;
use App\Statement;
use App\Trip;
use App\TripCall;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;

class DriverController extends Controller
{
    private $data = [];

    private function getDriver($id){
        $this->data['driver'] = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();
    }

    /**
     * @api {get} /investor/menu Get drivers list
     * @apiName Drivers List
     * @apiGroup Drivers
     * @apiDescription Returns a page with a list of drivers
     * @apiSuccess {page} page Drivers list.
     */
    //get drivers list for menu
    public function getDrivers(Request $request){
        $drivers = Driver::select('_id', 'full_name', 'driver_status', 'vendor_id')->get()->toArray();

        $drivers_out = [];

        foreach ($drivers as $driver){
            if (isset($driver['vendor_id']) && $driver['vendor_id'] == session('user_id')){
                $drivers_out[] = $driver;
            }
        }

        $out_drivers = new PaginationArrayController($drivers_out,20);

        return view('menu.drivers_list', ['drivers'=>$out_drivers->getPageData($request)]);
    }

    /**
     * @api {get} /investor/{id} Get drivers menu
     * @apiName Driver Menu
     * @apiGroup Drivers
     * @apiDescription Returns a page with a menu of driver
     * @apiParam {string} id The drivers id
     * @apiSuccess {page} page Drivers menu.
     * @apiError {page} page 404.
     */
    //get drivers data for personal menu
    public function getDriverMenu($id){
        $driver = Driver::select('_id', 'full_name', 'address', 'last_lat', 'last_lng')->where('_id', $id)->first()->toArray();
        if (count($driver) == 0){
            return view('errors.404',$this->data);
        }
        return view('menu.personal_menu', ['driver'=>$driver]);
    }

    private function getBookingsData($id){
        $trips = Trip::all();
        $trips = $trips->where('driver_id', $id)->toArray();

        return $trips;
    }

    /**
     * @api {get} /investor/booking/{id} Get drivers Booking and Missed
     * @apiName Booking and Missed
     * @apiGroup Drivers
     * @apiDescription Returns a page with a booking and missed of driver
     * @apiParam {string} id The drivers id
     * @apiSuccess {page} page Booking and Missed.
     */
    //get data for booking and missed pages
    public function getBooking(Request $request, $id){
        $this->getDriver($id);
        $bookings = $this->getBookingsData($id);

        $bookings_data = new PaginationArrayController($bookings,20);
        $this->data['bookings'] = $bookings_data->getPageData($request);
        $this->data['rs_booking'] = $bookings_data->count_array;

        return view('menu.options.bookings_extension', $this->data);
    }

    public function getMissed(Request $request, $id){
        $trip_calls = TripCall::all();
        $trip_calls = $trip_calls->where('driver_id', $id)->where('status', "missed")->toArray();

        $this->getDriver($id);

        $bookings = collect($this->getBookingsData($id));

        foreach ($trip_calls as $key=>$trip_call) {
            $trip_no = '';
            $booking = $bookings->where('_id', $trip_call['trip_id'])->first();

            if ($booking) {
                $trip_no = $booking['trip_no'];
            }

            $trip_calls[$key]['trip_no'] = $trip_no;
        }

        $misseds_data = new PaginationArrayController($trip_calls,20);
        $this->data['misseds']  = $misseds_data->getPageData($request);

        return view('menu.options.misseds_extension', $this->data);
    }

    /**
     * @api {get} /investor/settings/{id} Get drivers profile detail list
     * @apiName Drivers Profile
     * @apiGroup Drivers
     * @apiDescription Returns a page with a profile of driver
     * @apiParam {string} id The drivers id
     * @apiSuccess {page} page Profile
     * @apiError {page} page 404.
     */
    //get driver profile
    public function getDriverProfile($id){
        $driver = Driver::where('_id', $id)->first()->toArray();
        $city = City::where('_id', $driver['city'])->first()->toArray();
        $driver['city_data'] = $city;

        if (count($driver) == 0){
            return view('errors.404',$this->data);
        }

        return view('menu.options.profile_page', ['driver'=>$driver]);
    }

    /**
     * @api {get} /investor/booking/detail/{trip_no}/{driver_id} Get details of booking
     * @apiName Booking Detail
     * @apiGroup Drivers
     * @apiDescription Returns a page with a details of booking
     * @apiParam {string} driver_id The drivers id
     * @apiParam {string} trip_no The trip number
     * @apiSuccess {page} page details of booking
     * @apiError {page} page 404.
     */
    //get booking detail
    public function getBookingDetail($trip_no, $id){
        $this->getDriver($id);

        $this->data['details'] = Invoice::where('trip_no', $trip_no)->first();
        if(count($this->data['details'])){
            $this->data['details'] = $this->data['details']->toArray();
        }

        $this->data['trip'] = Trip::where('trip_no', $trip_no)->first();
        if(count($this->data['trip'])){
            $this->data['trip'] = $this->data['trip']->toArray();
        }

        if (count($this->data['details']) == 0 && count($this->data['trip']) == 0){
            return view('errors.404',$this->data);
        }

        return view('menu.options.booking_detail',$this->data);
    }

    /**
     * @api {get} /investor/wallets/{id} Get drivers Wallets
     * @apiName Wallets
     * @apiGroup Drivers
     * @apiDescription Returns a page with a wallets of driver
     * @apiParam {string} id The drivers id
     * @apiSuccess {page} page Wallets.
     */
    // get wallet data
    public function getWallets(Request $request, $id){
        $wallets_all = Wallet::all()->toArray();
        $this->getDriver($id);

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

        $wallets_out = new PaginationArrayController($wallets_out,20);

        $this->data['wallets'] = $wallets_out->getPageData($request);

        return view('menu.options.wallets', $this->data);
    }

    /**
     * @api {get} /investor/complaints_filed/{id} Get drivers Complaints Filed
     * @apiName Complaints Filed
     * @apiGroup Drivers
     * @apiDescription Returns a page with a complaints filed of driver
     * @apiParam {string} id The drivers id
     * @apiSuccess {page} page Complaints Filed.
     */
    //get Complaints Filed data
    public function getComplaintsFiled($id){
        $trips = Trip::all()->toArray();
        $this->getDriver($id);

        $trips_id = [];
        foreach ($trips as $trip){
            if(isset($trip['driver_id']) && $trip['driver_id'] == $id){
                $trips_id[] =  isset($trip['trip_no'])?$trip['trip_no']:'';
            }
        }

        $complaints_fileds = ComplaintFiled::whereIn('trip_id', $trips_id)->get()->toArray();
        $this->data['complaints_fileds'] = $complaints_fileds;

        return view('menu.options.complaints_filed',$this->data);
    }

    /**
     * @api {get} /investor/statements/{id} Get drivers Statements
     * @apiName Statements
     * @apiGroup Drivers
     * @apiDescription Returns a page with a statements of driver
     * @apiParam {string} id The drivers id
     * @apiSuccess {page} page Statements.
     */
    // get Statements data
    public function getStatements($id){
        $statement = Statement::all();
        $statement = $statement->where('partner_id', $id)->first();
        if($statement) {
            $statement = $statement->toArray();
        } else {
            $statement = [];
        }
        $this->getDriver($id);

        $this->data['statements'] = $statement;

        return view('menu.options.statements', $this->data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMessage($id){
        $driver = Driver::where('_id', $id)->first()->toArray();
        return view('menu.options.send_message', ['driver'=>$driver]);
    }

    /**
     * @api {post} /send_message Send Message
     * @apiName Send Message
     * @apiGroup Drivers
     * @apiDescription Send message from driver
     * @apiParam {string} driver_id The drivers id
     * @apiParam {string} content The message for send
     * @apiParam {string} value The value of parameter for change
     * @apiParam {string} name The name of parameter for change
     * @apiSuccess {back} page Back to send page.
     */
    public function sendMessage(Request $request){
        $data = $request->all();
        $data['driver'] = Driver::where('_id', $request['driver_id'])->first()->toArray();
        $city = City::where('_id', $data['driver']['city'])->first()->toArray();
        $data['city_data'] = $city;
        Mail::send(new SendMail($data));

        return redirect()->route('get_driver_profile', ['id'=>$request['driver_id']]);
    }

}
