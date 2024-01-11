<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Mail;
use App\Http\Controllers\form_handler;
use App\Models\User;
use App\Http\Controllers\Formdata;
use App\Models\UserModel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('send_mail');
});
// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::post('/send_mail', function (Request $request)
{
    $data = $request->only('name','email','password');
    return $data;
    // return view('/error');
});

Route::get('/test', function (){
    return view('test');
});

Route::get('/show/{id}', function ($id){
    return view('login');
});
Route::get('/show', function (){
    return view('login');
});


Route::get('/mail',[Mail::class,'mail_transfer']);
Route::get('/error', [form_handler::class, 'validation']);
// Route::post('/show_data', [form_handler::class, 'show']);

// Route::get('welcome/{name}/{panel_name}',function ($name,$panel_name='Panel'){
//     return view('welcome',['name'=>$name,'panel_name'=> $panel_name]);
// });
// Route::redirect('/here', '/there');

// Route::get('/welcome/name', function ($name = null) {
//     return view('welcome',[form_handler::class,'show']);
// })->name('name');

// Route::get('/welcome/{name}',[form_handler::class,'show']);
Route::get('/welcome/{id}', [form_handler::class, 'update']);
// Route::get('/welcome', function (Request $request){
//     return $request;
// });

Route::get('/home', function () {
    return response('Hello World', 200)->header('Content-Type', 'text/plain');
});

Route::get('/dashboard', function () {
    return redirect('welcome/{name}',
        [form_handler::class, 'update']
    );
});

Route::get('/user_form', [Formdata::class,'userdata'] );
Route::post('/user_data', [Formdata::class,'send_data']);
// Route::get('/user_form', function (){
//     return view('form');
// });

Route::post('/login', [Formdata::class,'check_login_data']);
Route::get('/welcome', [Formdata::class,'fetch_all_user_data']);

// Route::get('/welcome', function (){
//     return view('welcome');
// });
