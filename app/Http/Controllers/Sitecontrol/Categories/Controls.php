<?php

namespace App\Http\Controllers\Sitecontrol\Categories;

use App\Enums\GroupTypes;
use App\Models\ContentGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Config;
use Validator;

class Controls extends MyController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->data['view_directory']       = 'sitecontrol.managecategories.';
    }

    /**
     * 
     * View All Categories
     * 
     * @return view
     * 
     */
    public function index()
    {
        $this->data['view']                 = 'view';
        $this->data['page_title']           = 'Categories';

        $this->data['categories']           = ContentGroup::where('group_type', GroupTypes::__CATEGORY)->get(); 

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }

    /**
     * 
     * Create a Category
     * 
     * @return view
     * 
     */
    public function create()
    {
        $this->data['view']                 = 'edit';
        $this->data['page_title']           = 'Add Category';

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }

    /**
     * 
     * Edit a Category
     * 
     * @return view
     * 
     */
    public function edit($category_id)
    {
        $this->data['view']                 = 'edit';
        $this->data['page_title']           = 'Edit Category';

        $this->data['category']             = ContentGroup::where('id', $category_id)->first();

        return view(Config::get('constants.__SITECONTROL_TEMPLATE'), $this->data);
    }

    /** 
     * 
     * Save Category
     * 
     * @param Request $request
     * 
     * @return object|redirect 
     * 
    */
    public function save(Request $request)
    {
        $rules = [
            'name'         => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {
            $messages     = $validator->messages();
            return redirect()->back()->withInput()->withErrors($messages);
        }
                
        $save_data          = new ContentGroup();

        if( ContentGroup::where('id', $request->edit_id)->first() )
        {
            $save_data = ContentGroup::where('id', $request->edit_id)->first();
        }
        
        $save_data->name            = $request->name;
        $save_data->group_type      = GroupTypes::__CATEGORY;

        $save_data->save();

        return redirect(route('categories'))->with([
            'message' => 'Category saved successfully',
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
    public function delete($category_id)
    {
        $category               = ContentGroup::where('id', $category_id)->first();

        if($category)
        {
            $category->delete();

            return redirect(route('categories'))->with([
                'message' => 'Category deleted successfully',
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
