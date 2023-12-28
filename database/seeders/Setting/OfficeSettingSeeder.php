<?php

namespace Database\Seeders\Setting;

use App\Models\Setting\OfficeSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OfficeSetting::create([
            'title' => 'Online Shop',
            'email' => null,
            'logo' => null,
            'background_image' => null,
            'google_map' => null,
            'phone' => null,
            'website' => null,
            'facebook_link' => null,
            'introduction' => null,
            'address'=> null,
            'delivery_charge'=>null
        ]);
    }
}
