<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('vendor_id')->constrained();
            $table->timestamps();
            $table->string('device_type')->default('CABLE_MODEM');
            $table->integer('serial_number_length')->nullable();
            $table->string('docsis_version', 10)->nullable();
            $table->integer('scqam_downstream_compatibility')->default(1);
            $table->integer('scqam_upstream_compatibility')->default(1);
            $table->integer('ofdm_downstream_compatibility')->default(1);
            $table->integer('ofdm_upstream_compatibility')->default(1);
            $table->boolean('wifi2g')->default(false);
            $table->boolean('wifi5g')->default(false);
            $table->boolean('telephony')->default(false);
            $table->double('download_min_speed')->nullable();
            $table->double('upload_min_speed')->nullable();
            $table->boolean('lan1')->default(false);
            $table->boolean('lan2')->default(false);
            $table->boolean('lan3')->default(false);
            $table->boolean('lan4')->default(false);
            $table->string('image_url')->nullable();
            $table->boolean('show_on_user_management')->default(false);
            $table->string('tariff_number')->nullable();
            $table->boolean('cat_tv_compatibility')->default(false);
            $table->double('cat_tv_power_min')->default(0);
            $table->double('cat_tv_power_max')->default(0);
            
            $table->unique(['name', 'vendor_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('models');
    }
};