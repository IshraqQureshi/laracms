<?php

namespace App\Http\Helpers;

use App\Models\Content;
use App\Enums\SettingKeys;
use App\Enums\ContentTypes;
use App\Models\SiteSetting;

class GeneralHelper{

  /**
   * 
   * Get Setting Keys Enum ID
   * 
   * @param string $setting_key
   * @return int $setting_key_id
   */
  static function setting_keys_id($setting_key)
  {
    if( $setting_key == 'site_title' )
    {
      return SettingKeys::__SITE_TITLE;
    }
    elseif ( $setting_key == 'site_theme' )
    {
      return SettingKeys::__SITE_THEME;
    }
    elseif ( $setting_key == 'font_sizes' )
    {
      return SettingKeys::__FONT_SIZES;
    }
    elseif ( $setting_key == 'admin_email' )
    {
      return SettingKeys::__ADMIN_EMAIL;
    }
    elseif ( $setting_key == 'cc_emails' )
    {
      return SettingKeys::__CC_EMAIL;
    }
    elseif ( $setting_key == 'home_page' )
    {
      return SettingKeys::__HOME_PAGE;
    }
    elseif ( $setting_key == 'site_logo' )
    {
      return SettingKeys::__SITE_LOGO;
    }
  }

  /**
   * 
   * Set Input Values
   * 
   * @param string $field_name
   * @param string $defult_value
   * 
   * @return string $value
   * 
   */
  static function set_values($field_name = '', $defult_value = '')
  {
    if( old($field_name) != '' )
    {
      return old($field_name);
    }

    return $defult_value;
  }


  /**
   * 
   * Make slug for title
   * 
   * @param string $title
   * @param Model $model
   * @param int $id
   * 
   * @return string $slug
   * 
  */

  static function make_slug($title, $model, $id = '')
  {
    $slug   = str_replace(' ', '-', strtolower($title));
    
    if( $model->where('slug', $slug)->count() > 0 )
    {
      $slug = $slug . '-' . $model->where('slug', $slug)->count();
    }

    return $slug;
  }

  /**
   * 
   * Get Site Theme Value
   * 
   * @return string $site_theme
   */

   static function getSiteTheme()
   {
     $site_theme    = SiteSetting::where('setting_key', SettingKeys::__SITE_THEME)->first();

     return $site_theme->setting_value;
   }

   /**
   * 
   * Get Site Navigation
   * 
   * @return collection $content_navigation
   */

  static function getSiteNavigation()
  {
    $content_navigation    = Content::select('id', 'title', 'slug')->where('content_type', ContentTypes::__PAGE)->get();
    return $content_navigation;
  }

  static function getSiteFontSize()
  {
    $font_size    = SiteSetting::where('setting_key', SettingKeys::__FONT_SIZES)->first();

    if( $font_size->setting_value == 'small' )
    {
      return "12px";
    }elseif($font_size->setting_value == 'medium')
    {
      return "16px";
    }elseif($font_size->setting_value == 'large')
    {
      return "20px";
    }
  }

}