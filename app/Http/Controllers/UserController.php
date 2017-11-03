<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function testLogin(){
        $data = ['email' => 'azmatraza91@gmail.com',
                 'password' => '123456'];
        $ch = curl_init();
        $uA = $_SERVER['HTTP_USER_AGENT'];

        $header[] = "Content-Type:application/x-www-form-urlencoded";

        curl_setopt($ch, CURLOPT_URL, 'https://staging.bykea.net:3000/api/v1/admin/login');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, $uA);

        $out = curl_exec($ch);

        dd($out, $ch);

        curl_close($ch);
    }

    public function loginPage(){
        return view('auth.login');
    }

    public function login(Request $request){
        return redirect()->route('menu');
        $request['username'];
        $request['password'];
    }

    public function changePasswordPage($id){
        $driver = Driver::select('_id', 'full_name')->where('_id', $id)->first()->toArray();

        return view('auth.change_password',['driver'=>$driver]);
    }

    public function changePassword(Request $request){
        return redirect()->route('menu');

        $driver = Driver::where('_id', $request['driver_id'])->first()->toArray();

        $request['password_old'];
        $request['password_new'];
        $request['password_new_1'];
    }
}