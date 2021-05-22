<?php

namespace Database\Seeders;

use App\Enums\SettingKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->insert([
            [
                'setting_key' => SettingKeys::__SITE_TITLE,
                'setting_value' => 'Deafault Title'
            ],
            [
                'setting_key' => SettingKeys::__SITE_THEME,
                'setting_value' => 'light'
            ],
            [
                'setting_key' => SettingKeys::__FONT_SIZES,
                'setting_value' => 'small'
            ],
            [
                'setting_key' => SettingKeys::__ADMIN_EMAIL,
                'setting_value' => 'ishraqqureshi99@gmail.com'
            ],
            [
                'setting_key' => SettingKeys::__CC_EMAIL,
                'setting_value' => 'Deafault Title'
            ]
        ]);
    }
}
