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
            'phone_number' =>'required',
            'country' =>'required',
            'area' =>'required',

         ]);
        //  Store data in database
        RegisterForm::create($request->all());
        //
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
