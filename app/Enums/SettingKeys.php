<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SettingKeys extends Enum
{
    const __SITE_TITLE =   1;
    const __SITE_THEME =   2;
    const __FONT_SIZES = 3;
    const __ADMIN_EMAIL = 4;
    const __CC_EMAIL = 5;
    const __HOME_PAGE = 6;
    const __SITE_LOGO = 7;
}
