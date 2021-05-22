<?php

namespace App\Http\Controllers\SiteControl\Pages;

use Validator;
use App\Models\Content;
use App\Enums\ContentTypes;
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

        $this->data['pages']                 = Content::where('content_type', ContentTypes::__PAGE)->get(); 

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
     * Edit a Pages
     * 
     * @return view
     * 
     */
    public function edit($page_id)
    {
        $this->data['view']                 = 'edit';
        $this->data['page_title']           = 'Edit Page';

        $this->data['page']                 = Content::where('id', $page_id)->first();

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
            'title'         => 'required',
            'featured_image' => 'mimes:jpg,jpeg,png'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {
            $messages     = $validator->messages();
            return redirect()->back()->withInput()->withErrors($messages);
        }

        $featured_image = '';

        if($request->has('featured_image'))
        {
            $fileDirectory          = 'uploads';

            $path = 'public/'.$fileDirectory;

            File::isDirectory($path) or File::makeDirectory($path, 777, true, true);

            $featured_image = $request->featured_image->store($path);
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
        $save_data->featured_image  = $featured_image;

        $save_data->save();

        return redirect(route('pages'))->with([
            'message' => 'Page saved successfully',
            'type'    => 'success',
            'title'   => 'Success'
        ]);


    }

    /** 
     * 
     * Delete page
     * 
     * @param int $page_id
     * 
     * @return redirect 
     * 
    */
    public function delete($page_id)
    {
        $page               = Content::where('id', $page_id)->first();

        if($page)
        {
            $page->delete();

            return redirect(route('pages'))->with([
                'message' => 'Page deleted successfully',
                'type'    => 'success',
                'title'   => 'Success'
            ]);
        }

        return redirect(route('pages'))->with([
            'message' => 'Something went wrong!!',
            'type'    => 'error',
            'title'   => 'Error'
        ]);
    }
}
