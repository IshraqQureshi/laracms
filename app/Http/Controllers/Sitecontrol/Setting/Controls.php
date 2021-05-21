<?php

namespace App\Http\Controllers\Sitecontrol\Setting;

use Validator;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Helpers\GeneralHelper;
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
            'cc_emails'     => 'required|email'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {
            $messages     = $validator->messages();
            return redirect()->back()->withInput()->withErrors($messages);
        }
        unset($request['_token']);
        
        foreach( $request->all() as $key => $value )
        {
            $save_data          = new SiteSetting();

            if( SiteSetting::where('setting_key', GeneralHelper::setting_keys_id($key))->first() )
            {
                $save_data          = SiteSetting::where('setting_key', GeneralHelper::setting_keys_id($key))->first();    
            }

            $save_data->setting_key             = GeneralHelper::setting_keys_id($key);
            $save_data->setting_value           = $value;

            $save_data->save();
        }
                

    }
}
