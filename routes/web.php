<?php

use App\Http\Controllers\HomeController;
use App\Models\Form;
use App\Models\FormResults;
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
Route::redirect('/', '/كلية_الدعوة');//ok

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


Route::post('/contact', [HomeController::class, 'RegisterForm'])->name('contact.store');
Route::post('/contact', [HomeController::class, 'formstore'])->name('form.store');


Route::get('/forms/{slug}', function ($slug) {
   $forms=Form::where("slug",$slug)->first();
    return view('form',compact( 'forms'));
});



Route::get('/export-users/{key}',[HomeController::class,'exportUsers'])->name('export-users');
