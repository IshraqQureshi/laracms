<?php

namespace App\Http\Controllers\SiteControl\Pages;

use Validator;
use App\Models\Content;
use App\Enums\ContentTypes;
use Illuminate\Http\Request;
use App\Http\Helpers\GeneralHelper;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Config;

class Controls extends MyController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->data['view_directory']       = 'sitecontrol.managepages.';
    }

    /**
     * 
     * View All Pages
     * 
     * @return view
     * 
     */
    public function index()
    {
        $this->data['view']                 = 'view';
        $this->data['page_title']           = 'Pages';

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }

    /**
     * 
     * Create a Pages
     * 
     * @return view
     * 
     */
    public function create()
    {
        $this->data['view']                 = 'edit';
        $this->data['page_title']           = 'Add Page';

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }

    /** 
     * 
     * Save page
     * 
     * @param Request $request
     * 
     * @return object|redirect 
     * 
    */
    public function save(Request $request)
    {
        $rules = [
            'title'         => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {
            $messages     = $validator->messages();
            return redirect()->back()->withInput()->withErrors($messages);
        }

        $save_data          = new Content();

        if( Content::where('id', $request->edit_id)->first() )
        {
            $save_data = Content::where('id', $request->edit_id)->first();
        }
        
        $save_data->content_type    = ContentTypes::__PAGE;
        $save_data->title           = $request->title;
        $save_data->content         = $request->content;
        $save_data->slug            = GeneralHelper::make_slug($request->title, new Content());
        $save_data->featured_image  = '';

        $save_data->save();

        return redirect()->back()->with([
            'message' => 'Page saved successfully',
            'type'    => 'success',
            'title'   => 'Success'
            ]);


    }
}
