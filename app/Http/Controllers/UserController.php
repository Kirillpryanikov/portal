<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{

    public function loginAPI($mail, $password){
        $curl = curl_init();
	$type='v';

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "3000",
            CURLOPT_URL => "https://secure.bykea.net:3000/api/v1/admin/login",
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

    private function loginValidator(Request $request){
        $validate = [
            'username' => 'required|email',
            'password' => 'required'
        ];

        return Validator::make($request->all(), $validate);
    }

    public function login(Request $request){
        $validator = $this->loginValidator($request);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $id = $this->loginAPI($request['username'], $request['password']);

        if ($id){
            $request->session()->put('user_id', $id);

            return redirect()->route('menu');
        } else {
            $validator->errors()->add('login','Incorrect login and password');

            return back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function logout(Request $request){
        $request->session()->forget('user_id');

        return redirect()->route('login');
    }
}
