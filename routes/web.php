<?php

use App\Http\Controllers\HomeController;
use App\Models\Form;
use App\Models\FormResults;
use App\Nova\Http\Cdontrollers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
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

Route::redirect('/', '/welcome'); //ok
Route::get('/emar', function () {
    return view('sadaqat.index');
});
Route::get('/data1', function () {
    return view('sadaqat.index');
});


Route::get('/taweieh', function () {
    $forms = Form::where("id", '23')->first();
    return view('pages.Taweieh.index', compact('forms'));
});


Route::get('/form_id', [HomeController::class, 'formId'])->name('formId');
Route::get('/form_questions_key', [HomeController::class, 'formQuestionsKey'])->name('formQuestionsKey');
Route::get('/form_questions', [HomeController::class, 'formQuestions'])->name('formQuestions');
Route::post('/sendform', [HomeController::class, 'sendForm'])->name('sendform');
Route::post('/ValidateForm', [HomeController::class, 'ValidateForm'])->name('ValidateForm');
// Route::get('/share3a', function () {
//     $forms = Form::where("slug", 'كلية_الدعوة')->first();
//     $ip = $_SERVER['REMOTE_ADDR'];
//     $exist = FormResults::where('form_id', $forms->id)->where('user_ip', $ip)->first();
//     if ($exist) {
//     }
//     $nqp = false;
//     $sakhnin = false;
//     $share3a = true;
//     return view('home', compact('forms', 'nqp','sakhnin','share3a'));
// });

Route::get('/share3a', function () {
    $forms = Form::find(24);

    return view('onoo', compact('forms'));
});
Route::get('share3a-nqb', function () {
    $forms = Form::where("slug", 'كلية_الدعوة_النقب')->first();
    $ip = $_SERVER['REMOTE_ADDR'];
    $exist = FormResults::where('form_id', $forms->id)->where('user_ip', $ip)->first();
    if ($exist) {
    }
    $nqp = true;
    $sakhnin = false;
    $share3a = false;
    return view('home', compact('forms', 'nqp', 'sakhnin', 'share3a'));
});
Route::get('share3a-sakhnin', function () {
    $forms = Form::where("id", '18')->first();
    $ip = $_SERVER['REMOTE_ADDR'];
    $exist = FormResults::where('form_id', $forms->id)->where('user_ip', $ip)->first();
    if ($exist) {
    }
    $share3a = false;
    $nqp = false;
    $sakhnin = true;
    return view('home', compact('forms', 'nqp', 'sakhnin', 'share3a'));
});
Route::get('/shbab-mwahadeh', function () {
    $forms = Form::where("id", '20')->first();
    $ip = $_SERVER['REMOTE_ADDR'];
    $exist = FormResults::where('form_id', $forms->id)->where('user_ip', $ip)->first();
    if ($exist) {
    }
    $share3a = false;
    $nqp = false;
    $sakhnin = true;
    return view('shbab-mwahadeh', compact('forms', 'nqp', 'sakhnin', 'share3a'));
});
Route::get('/igatha48', function () {
    $forms = Form::where("id", '21')->first();
    $page_title = "جمعية الأغاثة 48";
    return view('pages.igatha48', compact('forms', 'page_title'));
});
Route::get('/emar/{slug}', function () {
    return view('sadaqat.index');
});
Route::get('/thanks', function () {
    return view('thanks');
});
Route::get('/register_thanks', function () {
    return view('register_thanks');
})->name('register_thanks');
Route::get('/welcome', function () {
    return view('home1')->with('message', 'Data added Successfully');
});
Route::get('/register_2_lpage', function () {
    return view('light_lpage');
});
Route::get('/light_thanks', function () {
    return view('light_thanks');
});
Route::post('/contact', [HomeController::class, 'RegisterForm'])->name('contact.store');
Route::post('/formstore', [HomeController::class, 'formstore'])->name('form.store');

Route::post('/form-store-taweieh', [HomeController::class, 'formStoreTaweieh'])->name('form.store.Taweieh');

Route::get('/zakah-w-sadqah', function () {
    return view('pages.zakah-w-sadqah');
});


Route::get('/forms/{slug}', function ($slug) {
    $forms = Form::where("slug", $slug)->first();
    $questions = $forms->questions;
    $questions = json_decode($questions);
    if (count($questions) === 1) {
        $questions = $questions[0]->attributes->questions[0]->attributes->questions;
    } else {

        return view('sadaqat.index');
    }
    return view('light_lpage', compact('forms', 'questions'));
});
Route::get('/export-users/{key}', [HomeController::class, 'exportUsers'])->name('export-users');
Route::get('/export-form', [HomeController::class, 'exportForm'])->name('exportForm');
Route::get('/export-form-reseat', [HomeController::class, 'exportformreseat'])->name('exportformreseat');
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
