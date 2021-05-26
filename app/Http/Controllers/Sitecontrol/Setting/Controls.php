<?php

namespace App\Http\Controllers\Sitecontrol\Setting;

use Validator;
use App\Enums\SettingKeys;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Helpers\GeneralHelper;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Config;

class Controls extends MyController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->data['view_directory']       = 'sitecontrol.managesettings.';
    }

    /**
     * 
     * View Settings
     * 
     * @return view
     */
    public function index()
    {
        $this->data['view']                 = 'view';
        $this->data['page_title']           = 'Settings';

        $site_settings                           = SiteSetting::get();
        
        foreach($site_settings as $site_setting)
        {
            if( $site_setting->setting_key == SettingKeys::__SITE_TITLE )
            {
                $settings['site_title']    =    $site_setting->setting_value;
            }
            if( $site_setting->setting_key == SettingKeys::__SITE_THEME )
            {
                $settings['site_theme']    =    $site_setting->setting_value;
            }
            if( $site_setting->setting_key == SettingKeys::__FONT_SIZES )
            {
                $settings['font_sizes']    =    $site_setting->setting_value;
            }
            if( $site_setting->setting_key == SettingKeys::__ADMIN_EMAIL )
            {
                $settings['admin_email']    =    $site_setting->setting_value;
            }
            if( $site_setting->setting_key == SettingKeys::__CC_EMAIL )
            {
                $settings['cc_emails']    =    $site_setting->setting_value;
            }
            if( $site_setting->setting_key == SettingKeys::__HOME_PAGE )
            {
                $settings['home_page']    =    $site_setting->setting_value;
            }
            if( $site_setting->setting_key == SettingKeys::__SITE_LOGO )
            {
                $settings['site_logo']    =    $site_setting->setting_value;
            }
        }

        $this->data['site_settings']        = $settings;

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }

    /**
     * 
     * Save Settings
     * 
     * @param Request $request
     * @return string $message
     * 
     */
    public function save(Request $request)
    {
        $rules = [
            'site_title'    => 'required',
            'site_theme'    => 'required',
            'font_sizes'    => 'required',
            'admin_email'   => 'required|email',
            'cc_emails'     => 'required|email',
            'home_page'     => 'required',
            'site_logo'     => 'required|mimes:jpg,jpeg,png',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {
            $messages     = $validator->messages();
            return redirect()->back()->withInput()->withErrors($messages);
        }
        unset($request['_token']);

        if($request->has('site_logo'))
        {
            $fileDirectory          = 'uploads';

            $path = 'public/'.$fileDirectory;

            File::isDirectory($path) or File::makeDirectory($path, 777, true, true);

            $site_logo = $request->site_logo->store($path);
        }

       
        
        foreach( $request->all() as $key => $value )
        {
            
            $save_data          = new SiteSetting();

            if( SiteSetting::where('setting_key', GeneralHelper::setting_keys_id($key))->first() )
            {
                $save_data          = SiteSetting::where('setting_key', GeneralHelper::setting_keys_id($key))->first();    
            }

            $save_data->setting_key             = GeneralHelper::setting_keys_id($key);
            if($key === 'site_logo')
            {
                $save_data->setting_value           = $site_logo;   
            }else{
                $save_data->setting_value           = $value;
            }

            $save_data->save();
        }

        return redirect()->back()->with([
            'message' => 'Settings saved successfully',
            'type'    => 'success',
            'title'   => 'Success'
            ]);
                

    }
}
