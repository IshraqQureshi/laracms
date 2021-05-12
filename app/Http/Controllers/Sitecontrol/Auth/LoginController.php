<?php

namespace App\Http\Controllers\Sitecontrol\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Config;

class LoginController extends MyController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->data['view_directory']       = 'sitecontrol.auth.';
    }

    public function login()
    {
        $this->data['view']                 = 'login';
        $this->data['page_title']           = 'Login';

        return view(Config::get('constants.__AUTH_TEMPLATE'), $this->data);
    }
}
