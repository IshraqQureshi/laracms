<?php

namespace App\Http\Helpers;

use App\Enums\SettingKeys;

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
  }

}