<?php

namespace App\Http\Controllers;

use App\Models\RegisterForm;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function RegisterForm(Request $request) {


        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'phone_number' =>'required|digits_between:10,14',
            'country' =>'required',
            'area' =>'required',

         ], [
            'name.required' => 'الرجاء ادخال اسم',
            'phone_number.required' => 'ارجاء ادخال رقم الهاتف',
            'phone_number.digits_between' => 'الرجاء ادخال رقم الهاتف بشكل صحيح. ',
            'country.required' => 'الرجاء ادخال البلد',
            'area.required' => 'الرجاء ادخال المنطقة التي تريد التعلم فيها',




        ]);
        //  Store data in database
        RegisterForm::create($request->all());
        //
        return back()->with('success', 'شكرا');
    }
}
