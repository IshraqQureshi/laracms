<?php

namespace App\Http\Helpers;

use App\Models\Content;
use App\Enums\ContentTypes;

class DropdownHelper
{
  static function siteTheme()
  {
    $values   = array(
      ''        => 'Select Site Theme',
      'light'   => 'Light',
      'dark'    => 'Dark'
    );

    return $values;
  }

  static function fontSizes()
  {
    $values   = array(
      ''            => 'Select Font Size',
      'small'       => 'Small',
      'Medium'      => 'Medium',
      'large'       => 'Large', 
    );

    return $values;
    
  }

  static function pagesList()
  {
    $pages        = Content::where('content_type', ContentTypes::__PAGE)->get();

    $values       = array(
      ''       => 'Select Page'
    );
    foreach($pages as $page)
    {
      $values[$page->id]      = $page->title;  
    }

    return $values;
  }
}