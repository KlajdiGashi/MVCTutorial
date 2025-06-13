<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'vendor_id' => \App\Models\Vendor::factory(),
            'device_type' => 'CABLE_MODEM',
            'serial_number_length' => 12,
            'docsis_version' => '3.1',
            'wifi2g' => true,
            'wifi5g' => true,
            'telephony' => false
        ];
    }
}