<?php

use App\Http\Controllers\HomeController;
use App\Models\Form;
use App\Models\FormResults;
use App\Nova\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/welcome');//ok

Route::get('/كلية_الدعوة', function () {
    $forms=Form::where("slug",'كلية_الدعوة')->first();
    $ip = $_SERVER['REMOTE_ADDR'];
    $exist = FormResults::where('form_id', $forms->id)->where('user_ip', $ip)->first();
    // dd($exist);
    if ($exist) {
        return view('thanks');
    }
    return view('home',compact( 'forms'));
});
Route::get('/thanks', function () {
    return view('thanks');
});
Route::get('/register_thanks', function () {
    return view('register_thanks');
})->name('register_thanks');
Route::get('/welcome', function () {

    return view('home1')->with('message','Data added Successfully');
});

Route::get('/register_2_lpage', function () {
    return view('light_lpage');
});
Route::get('/light_thanks', function () {
    return view('light_thanks');
});



Route::post('/contact', [HomeController::class, 'RegisterForm'])->name('contact.store');
Route::post('/formstore', [HomeController::class, 'formstore'])->name('form.store');


Route::get('/forms/{slug}', function ($slug) {

    $forms=Form::where("slug",$slug)->first();
    // $ip = $_SERVER['REMOTE_ADDR'];
    // $exist = FormResults::where('form_id', $forms->id)->where('user_ip', $ip)->first();
    // // dd($exist);
    // if ($exist) {
    //     return view('thanks');
    // }
    return view('light_lpage',compact( 'forms'));

});



Route::get('/export-users/{key}',[HomeController::class,'exportUsers'])->name('export-users');
Route::get('/export-form',[HomeController::class,'exportForm'])->name('exportForm');
Route::get('/export-form-reseat',[HomeController::class,'exportformreseat'])->name('exportformreseat');


Route::get('store-form', [HomeController::class, 'store'])->name('form.stores');;

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from sajilne.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyUSerMail($details));

    dd("Email is Sent.");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('nova/logout', [LoginController::class, 'logout'])->name('nova.logout');
