<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modems', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();
            $table->string('cm_mac')->nullable();
            $table->string('mta_mac')->nullable();
            $table->string('gw_mac')->nullable();
            $table->string('identifier')->nullable();
            $table->string('current_state')->nullable();

            $table->string('wlan1mac')->nullable();
            $table->string('wlan2mac')->nullable();

            $table->foreignId('model_version_id')->nullable()->constrained('model_versions')->onDelete('set null');
            $table->foreignId('imported_model_version_id')->nullable()->constrained('model_versions')->onDelete('set null');

            $table->string('first_firmware')->nullable();
            $table->string('last_firmware')->nullable();

            $table->string('ssid24')->nullable();
            $table->string('pass24')->nullable();
            $table->string('ssid50')->nullable();
            $table->string('pass50')->nullable();

            $table->string('first_int_name')->nullable();
            $table->string('last_int_name')->nullable();

            $table->boolean('allow_print')->default(false);
            $table->boolean('printed')->default(false);
            $table->string('status')->nullable();

            $table->json('meta')->nullable();

            $table->foreignId('truck_id')->nullable()->constrained('trucks')->onDelete('set null');
            $table->foreignId('box_id')->nullable()->constrained('boxes')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modems');
    }
};
