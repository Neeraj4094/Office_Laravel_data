<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class Formdata extends Controller
{
    public function userdata(){
        return view('form');
    }

    
    public function send_data(Request $request){
        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email',
                'password' => 'required|max:20|min:8',
                'phone_number' => 'required|max:10',
                'gender' => 'required',
            ]
        );
        
        // print_r($request->only('_token','name','email','password','phone_number','gender'));


        $user_details = new UserModel;
        $user_details->name = $request['name'];
        $user_details->email = $request['email'];
        $user_details->password = md5($request['password']);
        $user_details->phone_number = $request['phone_number'];
        $user_details->gender = $request['gender'];
        
        $user_details->save();
        $msg = "Registeration Successfull";
        return redirect('/user_form')->with('msg',$msg);
    }

    public function check_login_data(Request $request){
        $fetch_user_data = UserModel::all();
        $user_data = $fetch_user_data->toArray();

        $request->validate(
            [
                'login_email' => 'required|email',
                'login_password' => 'required|',
            ]
        );

        $user_details = new UserModel;
        $user_details->email = $request['login_email'];
        $user_email = $user_details->email;
        $user_details->password = md5($request['login_password']);
        $password = $user_details->password;

        foreach($user_data as $key => $data) :
            $email_list[] = $data['email'];
            $password_list[] = $data['password'];
            if($user_email == $data['email']){
                $user_email_data = $data;

            }
        endforeach;
        
        if(in_array($password , $user_email_data)){
            $user = "You can go to Dashboard";
            return redirect('/welcome')->with('user',$user );
          }else{
            return redirect('/login')->with('user_not_exist', "Email & Password not matched");
        }
    }

    public function fetch_all_user_data (){
        // if(request()->session()->has('user')){
        //     $user_login_data = request()->session()->get('user');
        // }
        $data = UserModel::all();
        $user_data = compact('data');
        return view('welcome')->with($user_data);
    }
}
