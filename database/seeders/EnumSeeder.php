<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enum_setting_keys')->insert([
            [
                'setting_key' => 'site_title'
            ],
            [
                'setting_key' => 'site_theme'
            ],
            [
                'setting_key' => 'font_sizes'
            ],
            [
                'setting_key' => 'admin_email'
            ],
            [
                'setting_key' => 'cc_emails'
            ]
        ]);

        DB::table('enum_content_types')->insert([
            [
                'content_type' => 'post'
            ],
            [
                'content_type' => 'page'
            ]
        ]);

        DB::table('enum_group_types')->insert([
            [
                'group_type' => 'category'
            ],
            [
                'group_type' => 'tag'
            ]
        ]);
        
        DB::table('enum_navigation_locations')->insert([
            [
                'navigation_location' => 'primary'
            ],
            [
                'navigation_location' => 'footer'
            ]
        ]);
    }
}
