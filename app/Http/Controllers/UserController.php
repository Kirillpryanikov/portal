<?php

namespace App\Http\Controllers;

use App\Driver;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class UserController extends Controller
{
    use AuthenticatesUsers;
    public function loginAPI($mail, $password){
        $curl = curl_init();
	$type='v';

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
        $isAdmin = false;
        $data = collect(json_decode($response));

        if (isset($data['data'])){
            $data = collect($data['data']);

            if (isset($data['personalInfo'])){
                $id = $data['personalInfo']->_id;
                $isAdmin = data_get($data, 'personalInfo.isAdmin', false);
            }

        }

        return [$id,$isAdmin];
    }



    public function loginAdmin(Request $request){


        $user = DB::connection('mysql')->table('users')
            ->where('email', request('username'))
            ->where('password', request('password'))
            ->first();
        if ($user !== null){
            $request->session()->put('user_id', $user->id);
                $request->session()->put('admin', 'true');
            return redirect()->route('menu');
        }else{
            return back();
        }

    }

    public function loginPage(){
        return view('auth.login_user');
    }

    private function loginValidator(Request $request){
        $validate = [
            'username' => 'required|email',
            'password' => 'required'
        ];

        return Validator::make($request->all(), $validate);
    }

    public function loginUser(Request $request){
        $request->session()->put('user_id', '58f209827f42836b7199a266');
        $validator = $this->loginValidator($request);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $id = $this->loginAPI($request['username'], $request['password']);

        if ($id[0]){
            $request->session()->put('user_id', $id);
            if ($id[1] === true){
                $request->session()->put('admin', 'true');
            }

            return redirect()->route('menu');
        } else {
            $validator->errors()->add('login','Incorrect login and password');

            return back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->forget('user_id');
        $request->session()->forget('admin');

        return redirect()->route('login_user');
    }
}
