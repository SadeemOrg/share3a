<?php

namespace App\Http\Controllers;

use App\Exports\ExportAlmowahde;
use App\Exports\ExportForm;
use App\Exports\ExportFormReselt;
use App\Exports\ExportTaweieh;
use App\Exports\ExportUser;
use App\Models\Form;
use App\Models\FormResults;
use App\Models\RegisterForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use PhpParser\JsonDecoder;

class HomeController extends Controller
{
    public function formstore(Request $request)
    {

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
            if (!($key == 'formid' || $key == '_token')) {
                $pus = array(
                    'questionskey' => $key,
                    'questionsanswerkey' => $value,
                );
                array_push($finallresult, $pus);
            }
        }
        $FormResults = new FormResults();
        $FormResults->form_id = $request->formid;
        $FormResults->result = json_encode($finallresult);
        $FormResults->user_ip = $ip;
        $FormResults->browser = $browser;
        $FormResults->os = $osPlatform;

        $FormResults->save();
        $form = Form::find($request->formid);
        $id = $form->id;
        $logo = $form->icons;
        if ($id == 20)
            return view('shabab-mwahdeh-success-form', compact('logo'));
        if ($id == 21) {
            $page_title = "جمعية الأغاثة 48";
            return view('pages.igatha48-success-form', compact('page_title'));
        }

        if ($id == 23) {
            return response()->json([
                'status' => 'success',
                'message' => 'Page loaded successfully',
            ], 200);
        }

        if ($form->type == 1)
            return view('thanks');
        return view('light_thanks', compact('form'));
    }
    public function formStoreTaweieh(Request $request)
    {
        $this->validate($request, [
            'الاسم الكامل' => 'required',
            'الهاتف' => ['required', 'regex:/^\+?\d{10,14}$/'],
            'note' => 'required',
        ], [
            'الاسم الكامل.required' => 'الرجاء ادخال اسم',
            'الهاتف.required' => 'ارجاء ادخال رقم الهاتف',
            'الهاتف.regex' => 'الرجاء ادخال رقم الهاتف بشكل صحيح. ',
            'note.required' => 'الرجاء ادخال البلد',
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
            if (!($key == 'formid' || $key == '_token')) {
                $pus = array(
                    'questionskey' => $key,
                    'questionsanswerkey' => $value,
                );
                array_push($finallresult, $pus);
            }
        }
        $FormResults = new FormResults();
        $FormResults->form_id = $request->formid;
        $FormResults->result = json_encode($finallresult);
        $FormResults->user_ip = $ip;
        $FormResults->browser = $browser;
        $FormResults->os = $osPlatform;

        $FormResults->save();
        $form = Form::find($request->formid);
        $id = $form->id;
        $logo = $form->icons;
        if ($id == 20)
            return view('shabab-mwahdeh-success-form', compact('logo'));
        if ($id == 21) {
            $page_title = "جمعية الأغاثة 48";
            return view('pages.igatha48-success-form', compact('page_title'));
        }

        if ($id == 23) {
            return response()->json([
                'status' => 'success',
                'message' => 'Page loaded successfully',
            ], 200);
        }

        if ($form->type == 1)
            return view('thanks');
        return view('light_thanks', compact('form'));
    }
    public function RegisterForm(Request $request)
    {
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
        $RegisterForm = RegisterForm::create($request->all());
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
    public function ValidateForm(Request $request)
    {

        $data = $request->all();
        $forms = Form::where("id", $request->id)->first();


        $Contents = json_decode($forms->questions);
        $page = $request->page;
        $errorArray = [];
        // dd($Contents[$page]->attributes->questions[0]->attributes->questions[0]->attributes->required);
        foreach ($Contents[$page]->attributes->questions as $key => $attributes) {
            if ($attributes->layout != 'multi_section') {


                // dd($attributes);
                foreach ($attributes->attributes->questions as $key => $questions) {
                    // dump($questions->layout=='radio_select_depend');
                    if ($questions->layout == 'radio_select_depend') {
                        // dd($questions->attributes->text);
                        $val = $questions->attributes->text;
                        $newString = str_replace(' ', '_', $val);
                        if (isset($request->$newString) && $request->$newString == 1) {

                            foreach ($questions->attributes->questions as $key => $valueDepend) {
                                # code...

                                if ($valueDepend->attributes->required) {
                                    $val = $valueDepend->attributes->text;
                                    $newString = str_replace(' ', '_', $val);
                                    if (!isset($request->$newString)) {
                                        array_push($errorArray, $val);
                                        // dd($request->$newString);
                                    }
                                }
                            }
                        }
                    }
                    if (isset($questions->attributes->validation_num)) {



                        $val = $questions->attributes->text;
                        $newString = str_replace(' ', '_', $val);
                        if (isset($request->$newString) && (strlen($request->$newString) != $questions->attributes->validation_num)) {

                            $pus = array(
                                'key' => $questions->attributes->text,
                                'num' => $questions->attributes->validation_num,
                            );
                            $string = $questions->attributes->text . "**" . " يجب ان يحتوي على " . $questions->attributes->validation_num . " ارقام ";
                            array_push($errorArray, $string);
                        }
                    }
                    if ($questions->attributes->required) {

                        $val = $questions->attributes->text;
                        $newString = str_replace(' ', '_', $val);

                        if (!isset($request->$newString)) {
                            array_push($errorArray, $val);
                            // dd($request->$newString);
                        }
                    }
                }
            } else {
                // dd($attributes->attributes->select);
            }
        }

        return $errorArray;
    }
    function isJsonString($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
    public function sendForm(Request $request)
    {


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


        $data = $request->all();

        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $originalFilename = $file->getClientOriginalName();
                $cleanedFilename = str_replace(' ', '', $originalFilename);

                $fileName = time() . '_' . $cleanedFilename;
                $file->storeAs('uploads', $fileName, 'public');
                $data[$key] = URL::to('/') . '/storage/uploads/' . $fileName;
            }
        }

        $finallresult = array();

        foreach ($data as $key => $value) {
            if (!($key == 'formid' || $key == '_token')) {
                $pus = array(
                    'questionskey' => $key,
                    'questionsanswerkey' => $value,
                );
                array_push($finallresult, $pus);
            }
        }
        $FormResults = new FormResults();
        $FormResults->form_id = 15;
        $FormResults->result = json_encode($finallresult);
        $FormResults->user_ip = $ip;
        $FormResults->browser = $browser;
        $FormResults->os = $osPlatform;

        $FormResults->save();
        $form = Form::find($request->formid);

        return view('light_thanks', compact('form'));
    }

    public function exportUsers(Request $request, $key)
    {
        // dd( $request->all());
        $array = [];

        array_push($array, 12);

        return Excel::download(new ExportForm($key), 'users123.xlsx');
    }
    public function exportformreseat(Request $request)
    {

        $FormResults = FormResults::find($request->reselt0);

        $array = [];
        $data = $request->all();

        foreach ($data as $key => $value) {
            array_push($array, $value);
        }
        if ($FormResults->form_id == 20) {
            return Excel::download(new ExportAlmowahde($array), 'users123.xlsx');
        } elseif ($FormResults->form_id == 23) {
            return Excel::download(new ExportTaweieh($array), 'users123.xlsx');
        } else {
            return Excel::download(new ExportFormReselt($array), 'users123.xlsx');
        }
        return;
    }
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:3|max:50',
                'email' => 'required|email|unique:register_forms',
                'phone' => 'required|digits_between:10,14'
            ],
            [
                'name.required' => 'الرجاء ادخال الاسم. ',
                'name.string' => 'الرجاء ادخال الاسم بشكل صحيح . ',
                'name.min' => 'الاسم يجب ان يكون على الأقل 3 حروف. ',
                'name.max' => 'الاسم يجب ان لا يزيد عن 50 حرف. ',

                'email.required' => 'الرجاء ادخال ايميل',
                'email.email' => "يجب ان يكون الايميل صحيح",
                'email.unique' => 'يجب ان يكون الايميل غير مكرر',

                'phone.required' => 'الرجاء ادخال الاسم. ',
                'phone.digits_between' => 'الرجاء ادخال رقم الهاتف بشكل صحيح. ',

            ]
        );
        if ($validator->fails()) {

            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $FormResults = new RegisterForm();
        $FormResults->name = $request->name;
        $FormResults->email = $request->email;
        $FormResults->phone = $request->phone;

        $FormResults->save();

        $details = [
            'title' => 'شكرا لتسجيلك معنا',
            'body' => 'سيتم التواصل معكم قريبا من قبل احد المسولين'
        ];

        \Mail::to($request->email)->send(new \App\Mail\RegisterMail($details));


        return redirect('register_thanks')->with('status', 'Blog Post Form Data Has Been inserted');
    }
    public function formId(Request $request)
    {

        $forms = Form::where("slug", $request->slug)->first();
        return $forms->id;
    }
    public function formQuestions(Request $request)
    {


        $forms = Form::where("slug", $request->slug)->first();
        $Contents = json_decode($forms->questions);
        foreach ($Contents as $key => $page) {
            $array = [];
            foreach ($page->attributes->questions as $key => $sections) {

                if ($sections->layout == "Flexible_section") {
                    $sectionsArray = [];
                    foreach ($sections->attributes->questions as $key22 => $questions) {
                        if ($questions->attributes->required) {
                            array_push($sectionsArray, $questions->attributes->text);
                        }
                    }
                    $sections->attributes->validation = $sectionsArray;
                }

                if ($sections->layout == "section") {
                    # code...

                    foreach ($sections->attributes->questions as $key22 => $questions) {

                        if ($questions->attributes->required) {
                            array_push($array, $questions->attributes->text);
                        }
                    }
                }
            }

            $page->validation = $array;
        }

        return $Contents;
    }

    public function formQuestionsKey(Request $request)
    {
        // dd($request->all());
        //
        $forms = Form::where("slug", $request->id)->first();

        $Contents = json_decode($forms->questions);
        foreach ($Contents as $key => $page) {

            foreach ($page->attributes->questions as $key => $sections) {


                if ($sections->key == $request->key) {
                    foreach ($sections->attributes->select as $key => $select) {
                        if ($select->key == $request->choiceKey) {
                            if (isset($request->childCoiceSectionKey)) {
                                foreach ($select->attributes->select as $key => $value) {
                                    foreach ($value->attributes->select as $key => $value2) {
                                        if ($value2->key == $request->childCoiceSectionKey) {
                                            return $value2->attributes->select;
                                        }
                                    }
                                }
                            }
                            //
                            return $select->attributes->select;
                        }
                        # code...
                    }
                    // dd($sections->attributes->select);
                    // return $sections;
                }
            }
        }
    }
}
