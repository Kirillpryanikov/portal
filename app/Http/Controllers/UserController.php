<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function loginAPI($mail, $password){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "3000",
            CURLOPT_URL => "https://staging.bykea.net:3000/api/v1/admin/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\n$mail\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\n$password\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: e2887833-7404-7785-17ce-6ac2fb100a3e"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $id = '';

        $data = collect(json_decode($response));

        if (isset($data['data'])){
            $data = collect($data['data']);

            if (isset($data['personalInfo'])){
                $id = $data['personalInfo']->_id;
            }
        }

        return $id;
    }

    public function loginPage(){
        return view('auth.login');
    }

    public function login(Request $request){
        $id = $this->loginAPI($request['username'], $request['password']);
        if ($id){
            $request->session()->put('user_id', $id);
            return redirect()->route('menu');
        } else {
            return back();
        }
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