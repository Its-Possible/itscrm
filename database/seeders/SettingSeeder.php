<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Helpers\Interfaces\SettingInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $setting = new Setting();
        $setting->name = "Registo de novas contas";
        $setting->description = "Ativar ou desativar o registo de novos utilizadores da plataforma";
        $setting->key = SettingInterface::APP_SETTING_SIGN_UP_STATUS_KEY;
        $setting->value = SettingInterface::APP_SETTING_SIGN_UP_STATUS_ENABLED;
        $setting->default = SettingInterface::APP_SETTING_SIGN_UP_STATUS_DISABLED;
        $setting->save();
    }
}
