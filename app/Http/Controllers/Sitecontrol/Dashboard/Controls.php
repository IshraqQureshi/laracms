<?php

namespace App\Http\Controllers\Sitecontrol\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Config;

class Controls extends MyController
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->data['view_directory']       = 'sitecontrol.managedashboard.';
    }

    /** 
     * 
     * View Dashboard
     * 
     * @return view 
    */
    public function index()
    {
        $this->data['view']                 = 'view';
        $this->data['page_title']           = 'Dashboard';

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }
}
