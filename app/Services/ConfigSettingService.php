<?php

namespace App\Services;

use App\Models\ConfigSetting;
use Illuminate\Support\Collection;

class ConfigSettingService
{
    public function update(array $data): Collection
    {
        try {
            $settings = ConfigSetting::whereIn('name', array_keys($data))->get();

            $updatedSettings = $settings->map(function ($setting) use ($data) {
                $oldVal = $setting->value;
                $setting->update(['value' => $data[$setting->name]]);

                return [
                    'setting' => $setting->name,
                    'old_val' => $oldVal,
                    'new_val' => $setting->value,
                ];
            });

            return $updatedSettings;
        } catch (\Exception $e) {
            throw new \Exception("Error trying to update config settings: [{$e->getMessage()}]");
        }
    }
}
