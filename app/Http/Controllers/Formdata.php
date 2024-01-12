<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Formdata extends Controller
{
    public function userdata()
    {
        $url = url('/user_data');
        $heading = "Sign in Your Account";
        $data = compact('url', 'heading');
        return view('form')->with($data);
    }

    public function send_data(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'email' => 'required|unique:users,email',
                'password' => 'required|max:20|min:8',
                'phone_number' => 'required|max:10',
                'gender' => 'required',
            ]
        );

        $user_details = new UserModel;
        $user_details->name = $request['name'];
        $user_details->email = $request['email'];
        $user_details->password = Hash::make($request['password']);
        $user_details->phone_number = $request['phone_number'];
        $user_details->gender = $request['gender'];
        $user_details->save();

        $msg = "Registeration Successfull";
        return redirect('login')->with('msg',$msg);
    }

    public function check_login_data(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $password = $request['password'];
        $user = UserModel::where('email', '=', $request->input('email'))->first();
        if(!$user){
            return redirect()->back()->with('user_not_exist','Email & Passwortd not matched');
        }
        if(Hash::check($password, $user->password)) {
            if (auth()->check()) {
                echo "ok";
            }else{
                echo "No";
            }
            
            // return redirect('/dashboard');


        }else{
            return redirect()->back()->with('user_not_exist','Email & Passwortd not matched');
        }
    }

    public function user_logout(){
        // Auth::logout();
        return redirect('/login');
    }

    public function auth_user()
    {
        // return view('dashboard',[
            // $id = Auth::user()->id;
            // return $id;
        // ]);
    }

    public function fetch_all_user_data()
    {
        // $user = $this->auth_user();
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
        $fetch_user_data->password = Hash::make($request['password']);
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
