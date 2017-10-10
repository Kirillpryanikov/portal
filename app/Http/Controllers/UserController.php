<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request['username'];
        $request['password'];
    }

    public function changePasswordPage($id){
        $driver = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();

        return view('auth.change_password',['driver'=>$driver]);
    }

    public function changePassword(Request $request){
        $driver = Driver::where('_id', $request['driver_id'])->first()->toArray();

        $request['password_old'];
        $request['password_new'];
        $request['password_new_1'];
    }
}
