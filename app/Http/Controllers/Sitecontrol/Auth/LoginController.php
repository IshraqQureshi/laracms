<?php

namespace App\Http\Controllers\Sitecontrol\Auth;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Config;

class LoginController extends MyController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->data['view_directory']       = 'sitecontrol.auth.';
    }

    /** 
     * 
     * Get Login Form
     * 
     * @return view
    */

    public function login()
    {
        $this->data['view']                 = 'login';
        $this->data['page_title']           = 'Login';

        return view(Config::get('constants.__AUTH_TEMPLATE'), $this->data);
    }

    /** 
     * 
     * Authenticate Admin Login
     * 
     * @param Request $request
     * @return void 
    */

    public function getLogin(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {
            $messages     = $validator->messages();
            return redirect()->back()->withInput()->withErrors($messages);
        }

        $remember_me        = false;

        $credentials        = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        if( $request->remember_me )
        {
            $remember_me        = true;    
        }

        if( Auth::attempt($credentials, $remember_me) )
        {
            return redirect(route('dashboard'));        
        }
        
        return redirect()->back()->withInput()->withErrors(['message' => 'Email / Password is wrong']);

    }

    /**
     * 
     * Get Admin Logout
     * 
     * @return void
     * 
     */

     public function logout()
     {
        Auth::logout();
        return redirect(route('login'));
     }
}
