<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class Formdata extends Controller
{
    public function userdata()
    {
        $url = url('/user_data');
        $heading = "Sign in Your Account";
        $data = compact('url', 'heading');
        return view('form')->with($data);
    }

    // public function user_registration($data){
    //     return view('form');
    // }

    public function check_email_exist(Request $request)
    {
        $rules = ['email' => 'required|unique:users,email'];
        $errmsg = "Please enter valid & unique email";
        $msg = ['email.required' => $errmsg];
        return $request->validate($rules, $msg);
    }

    public function send_data(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'email' => 'required|unique:user_form_details,email',
                'password' => 'required|max:20|min:8',
                'phone_number' => 'required|max:10',
                'gender' => 'required',
            ]
        );

        // print_r($request->only('_token','name','email','password','phone_number','gender'));

        // $user_details = new UserModel;
        // $user_details->name = $request['name'];
        // $user_details->email = $request['email'];
        // $user_details->password = md5($request['password']);
        // $user_details->phone_number = $request['phone_number'];
        // $user_details->gender = $request['gender'];
        // $user_details->save();

        // $msg = "Registeration Successfull";
        // return redirect('login')->with('msg',$msg);
    }

    public function check_login_data(Request $request)
    {
        $fetch_user_data = UserModel::all();
        $user_data = $fetch_user_data->toArray();

        $request->validate(
            [
                'login_email'  => 'required|unique:users,email',
                'login_password' => 'required|',
            ]
        );

        $user_details = new UserModel;
        $user_details->email = $request['login_email'];
        $user_email = $user_details->email;
        $user_details->password = md5($request['login_password']);
        $password = $user_details->password;


        if (empty($user_data)) {
            $user_email_data = [];
        }
        foreach ($user_data as $key => $data) :
            // $email_list[] = $data['email'];
            $password_list[] = $data['password'];
            if ($user_email == $data['email']) {
                $user_email_data = $data;
            }
        endforeach;
        echo $user_email;
        if (in_array($password, $user_email_data)) {
            $user = $data;
            return redirect('/dashboard')->with('user', $user);
        } else {
            return redirect()->back()->with('user_not_exist', "Email & Password not matched");
        }
    }

    public function fetch_all_user_data()
    {
        $data = UserModel::all();
        $user_data = compact('data');
        return view('welcome')->with($user_data);
    }

    public function edit_user_data($id)
    {
        $user_data = UserModel::find($id);
        if (!empty($user_data)) {
            $url = url('/user/update') . '/' . $id;
            $heading = "Update Your Account";
            $fetch_data = compact('user_data', 'url', 'heading');
            return view('form')->with($fetch_data);
            // return view('update_user');
        } else {
            redirect('dashboard');
        }
    }

    public function update_user_data($id, Request $request)
    {
        $fetch_user_data = UserModel::find($id);
        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|required|unique:users,email',
                'password' => 'required|max:20|min:8',
                'phone_number' => 'required|max:10',
                'gender' => 'required',
            ]
        );

        // $user_details = new UserModel;
        $fetch_user_data->name = $request['name'];
        $fetch_user_data->email = $request['email'];
        $fetch_user_data->password = md5($request['password']);
        $fetch_user_data->phone_number = $request['phone_number'];
        $fetch_user_data->gender = $request['gender'];
        if ($fetch_user_data->save())
            return redirect('dashboard');
    }

    public function delete_user($id)
    {
        $user = UserModel::find($id);
        if (!empty($user)) {
            $user->delete();
        }
        return redirect('/dashboard');
    }
}
