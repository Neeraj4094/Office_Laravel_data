<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

// class errorhandler{
//     private function clear_data($data){
//         $data = trim($data);
//         $result = empty($data) ? "*Invalid" : '';
//         return $result;
//     }

//     public function is_name_valid($name){
//         $err = $this->clear_data($name);
//         if(!preg_match("/^[a-z ,.'-]+$/i",$name)){
//             $err = "*Invalid";
//             return $err;
//         }
//     }
//     public function is_email_valid($email){
//         $err = $this->clear_data($email);
//         if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/",$email)){
//             $err = "*Invalid";
//             return $err;
//         }
//     }
//     public function is_password_valid($password){
//         $err = $this->clear_data($password);
//         if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){
//             $err = "*Invalid";
//             return $err;
//         }
//     }
//     public function is_image_valid($image){
//         $error = $image['error'];
//         $image_name = $image['name'];
//         $image_ext = pathinfo($image_name, PATHINFO_BASENAME);
//         if(empty($image['error'])){
//             $extension = substr($image_ext,-3);
//             $ext_list = ['png','jpg'];
//             if(!in_array($extension,$ext_list)){
//                 $err = "Invalid extension";
//                 return $err;
//             }
//         }else{
//             $err = "Please select Image";
//             return $err;
//         }
//     }
    
// }

class form_handler extends Controller
{
    public $title = '';
    // public function __construct($componentname){
    //     $this->title=$componentname;
    // }
    // public function show($name){
    //     // return $this->title;
    //     return view('welcome', [
    //         'name' => User::show_email($name)
    //     ]);
    // }
    // public function update($name){
    //     // return $this->title;
    //     return view('welcome', [
    //         'name' => User::show_email($name)
    //     ]);
    // }
    public function store(Request $request){
        // return $this->title;
        return ($request->input('name'));
    }

    public function validation(Request $request)
    { 
        $validated = $request->validate([
            'name'     => 'required|max:50',
            'email'    => 'required|unique:posts|max:50',
            'password' => 'required|max:8|',
        ]);
        return $validated;
    }

    
}
