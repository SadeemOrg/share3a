<?php

namespace App\Http\Controllers;

use App\Exports\ExportForm;
use App\Exports\ExportFormReselt;
use App\Exports\ExportUser;
use App\Models\FormResults;
use App\Models\RegisterForm;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function formstore(Request $request)
    {

        // dd($request->all());

        $ip = $_SERVER['REMOTE_ADDR'];
        //Deep detect ip
        if (filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_FORWARDED'];
        }
        if (filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        }
        if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        if (filter_var(@$_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        }
        if (filter_var(@$_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        if ($ip == '::1') {
            $ip = '127.0.0.1';
        }

        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $osPlatform = "Unknown OS Platform";
        $osArray = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );
        foreach ($osArray as $regex => $value) {
            if (preg_match($regex, $userAgent)) {
                $osPlatform = $value;
            }
        }
        $browser = "Unknown Browser";
        $browserArray = array(
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
            '/netscape/i' => 'Netscape',
            '/maxthon/i' => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i' => 'Handheld Browser'
        );
        foreach ($browserArray as $regex => $value) {
            if (preg_match($regex, $userAgent)) {
                $browser = $value;
            }
        }


        $finallresult = array();
        $data = $request->all();
        // dd($data );
        foreach ($data as $key => $value) {
            if (!($key == 'formid' ||  $key == '_token')) {
                $pus = array(
                    'questionskey' => $key,
                    'questionsanswerkey' => $value,
                );
                array_push($finallresult, $pus);
            }
        }
        // dd($finallresult);
        $FormResults = new FormResults();
        $FormResults->form_id = $request->formid;
        $FormResults->result = json_encode($finallresult);
        $FormResults->user_ip = $ip;
        $FormResults->browser = $browser;
        $FormResults->os = $osPlatform;

        $FormResults->save();
        return view('thanks');
    }
    public function RegisterForm(Request $request)
    {


        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|digits_between:10,14',
            'country' => 'required',
            'area' => 'required',

        ], [
            'name.required' => 'الرجاء ادخال اسم',
            'phone_number.required' => 'ارجاء ادخال رقم الهاتف',
            'phone_number.digits_between' => 'الرجاء ادخال رقم الهاتف بشكل صحيح. ',
            'country.required' => 'الرجاء ادخال البلد',
            'area.required' => 'الرجاء ادخال المنطقة التي تريد التعلم فيها',




        ]);
        $ip = $_SERVER['REMOTE_ADDR'];
        //Deep detect ip
        if (filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_FORWARDED'];
        }
        if (filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        }
        if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        if (filter_var(@$_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        }
        if (filter_var(@$_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        if ($ip == '::1') {
            $ip = '127.0.0.1';
        }


        $exist = RegisterForm::where('user_ip', $ip)->first();
        if ($exist) {

            return back()->with('error', 'لقد سجلت مسبقا');
        }

        $osPlatform = "Unknown OS Platform";
        $osArray = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        foreach ($osArray as $regex => $value) {
            if (preg_match($regex, $userAgent)) {
                $osPlatform = $value;
            }
        }
        $browser = "Unknown Browser";
        $browserArray = array(
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
            '/netscape/i' => 'Netscape',
            '/maxthon/i' => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i' => 'Handheld Browser'
        );
        foreach ($browserArray as $regex => $value) {
            if (preg_match($regex, $userAgent)) {
                $browser = $value;
            }
        }

        //  Store data in database
        $RegisterForm =  RegisterForm::create($request->all());
        $RegisterForm->user_ip = $ip;
        $RegisterForm->browser = $browser;
        $RegisterForm->os = $osPlatform;
        $RegisterForm->save();
        //
        return back()->with('success', 'شكرا');
    }
    public function exportForm(Request $request)
    {
        // dd( $request->all());
        $array = [];
        $data = $request->all();
        // dd($data );
        foreach ($data as $key => $value) {
            array_push($array, $value);
        }

        return Excel::download(new ExportFormReselt($array), 'users123.xlsx');
    }

    public function exportUsers(Request $request, $key)
    {
        // dd( $request->all());
        $array = [];

        array_push($array, 12);

        return Excel::download(new ExportForm($key), 'users123.xlsx');
    }

    public function store(Request $request)
    {
        $FormResults = new RegisterForm();
        $FormResults->name = $request->name;
        $FormResults->email = $request->email;
        $FormResults->phone = $request->phone;

        $FormResults->save();

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\RegisterMail($details));


        return redirect('thanks')->with('status', 'Blog Post Form Data Has Been inserted');
    }
}
