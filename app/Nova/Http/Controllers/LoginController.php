<?php

namespace App\Nova\Http\Controllers;

use Laravel\Nova\Http\Controllers\LoginController as NovaLoginController;
use Illuminate\Http\Request;

class LoginController extends NovaLoginController
{
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Define your custom redirect path here after logout
        return redirect('/custom-logout-redirect-path');
    }
}
