<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Content;
use App\Enums\SettingKeys;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Config;

class HomepageController extends MyController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->data['view_directory']       = 'frontend.homepage.';
    }

    public function index()
    {
        $this->data['view']                         = 'view';

        $home_page_setting                          = SiteSetting::where('setting_key', SettingKeys::__HOME_PAGE)->first();
        $this->data['home_page']                    = Content::where('id', $home_page_setting->setting_value)->first();

        return view(Config::get('constants.__FRONTEND_TEMPLATE'), $this->data);

    }
}
