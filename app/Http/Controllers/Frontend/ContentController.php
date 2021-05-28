<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Config;

class ContentController extends MyController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->data['view_directory']       = 'frontend.content.';
    }

    public function page($slug)
    {
        $this->data['view']                         = 'page';

        $this->data['page']                         = Content::where('slug', $slug)->first();

        if($this->data['page'])
        {
            return view(Config::get('constants.__FRONTEND_TEMPLATE'), $this->data);
        }

        dd('Page Not Found');


    }
}
