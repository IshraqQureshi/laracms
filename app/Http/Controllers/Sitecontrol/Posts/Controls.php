<?php

namespace App\Http\Controllers\Sitecontrol\Posts;

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
        
        $this->data['view_directory']       = 'sitecontrol.manageposts.';
    }

    /**
     * 
     * View All Posts
     * 
     * @return view
     * 
     */
    public function index()
    {
        $this->data['view']                 = 'view';
        $this->data['page_title']           = 'Posts';

        $this->data['posts']                 = Content::where('content_type', ContentTypes::__POST)->get(); 

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }

    /**
     * 
     * Create a Post
     * 
     * @return view
     * 
     */
    public function create()
    {
        $this->data['view']                 = 'edit';
        $this->data['page_title']           = 'Add Post';

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }

    /**
     * 
     * Edit a Pages
     * 
     * @return view
     * 
     */
    public function edit($post_id)
    {
        $this->data['view']                 = 'edit';
        $this->data['page_title']           = 'Edit Post';

        $this->data['post']                 = Content::where('id', $post_id)->first();

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
        
        $save_data->content_type    = ContentTypes::__POST;
        $save_data->title           = $request->title;
        $save_data->content         = $request->content;
        $save_data->slug            = GeneralHelper::make_slug($request->title, new Content());
        $save_data->featured_image  = $featured_image;

        $save_data->save();

        return redirect(route('posts'))->with([
            'message' => 'Post saved successfully',
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
    public function delete($post_id)
    {
        $post               = Content::where('id', $post_id)->first();

        if($post)
        {
            $post->delete();

            return redirect(route('posts'))->with([
                'message' => 'Posts deleted successfully',
                'type'    => 'success',
                'title'   => 'Success'
            ]);
        }

        return redirect(route('posts'))->with([
            'message' => 'Something went wrong!!',
            'type'    => 'error',
            'title'   => 'Error'
        ]);
    }
}
