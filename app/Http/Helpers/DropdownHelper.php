<?php

namespace App\Http\Helpers;

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
}