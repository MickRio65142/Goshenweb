<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        Setting::firstOrCreate(['key' => 'portal_open'], ['value' => 'true']);
        Setting::firstOrCreate(['key' => 'registration_fee'], ['value' => '25000']);
        Setting::firstOrCreate(['key' => 'exam_portal_open'], ['value' => 'true']);
    }
}
