<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class NavigationLocations extends Enum
{
    const __PRIMARY =   1;
    const __FOOTER =   2;
}
