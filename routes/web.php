<?php

use App\Http\Controllers\HomeController;
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
    return view('home');
});
Route::get('/thanks', function () {
    return view('thanks');
});


Route::post('/contact', [HomeController::class, 'RegisterForm'])->name('contact.store');
