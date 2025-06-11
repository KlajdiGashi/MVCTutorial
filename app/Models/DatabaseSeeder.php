<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Vendor::factory(5)->create()->each(function ($vendor) {
            \App\Models\DeviceModel::factory(3)->create([
                'vendor_id' => $vendor->id
            ])->each(function ($model) {
                \App\Models\ModelVersion::factory(2)->create([
                    'model_id' => $model->id,
                    'hardware_version' => 'v' . rand(1, 5)
                ]);
            });
        });
    }
}