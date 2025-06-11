<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalModelsTables extends Migration
{
    public function up()
    {
        // Tags table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->nullable();
            $table->timestamps();
        });

        // Modem Activities
        Schema::create('modem_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modem_id')->constrained()->onDelete('cascade');
            $table->string('action');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->text('remark')->nullable();
            $table->json('meta')->nullable();
            $table->integer('updated_count')->nullable();
            $table->timestamps();
        });

        // Box Activities
        Schema::create('box_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modem_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('box_id')->constrained()->onDelete('cascade');
            $table->foreignId('old_box_id')->nullable()->constrained('boxes')->nullOnDelete();
            $table->string('action');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->text('remark')->nullable();
            $table->timestamps();
        });

        // Palet Activities
        Schema::create('palet_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('palet_id')->constrained()->onDelete('cascade');
            $table->foreignId('area_id')->nullable()->constrained()->nullOnDelete();
            $table->string('action');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->text('remark')->nullable();
            $table->timestamps();
        });

        // Signals
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modem_id')->constrained()->onDelete('cascade');
            $table->string('status')->nullable();
            $table->string('uptime')->nullable();
            $table->string('us_description')->nullable();
            $table->string('us_frequency')->nullable();
            $table->string('us_speed')->nullable();
            $table->string('us_power')->nullable();
            $table->string('us_signal_noise')->nullable();
            $table->string('us_modulation_type')->nullable();
            $table->string('us_ranging_status')->nullable();
            $table->string('us_uncorr')->nullable();
            $table->string('us_corr')->nullable();
            $table->string('us_noerror')->nullable();
            $table->string('pds_index')->nullable();
            $table->string('ds_description')->nullable();
            $table->string('ds_frequency')->nullable();
            $table->string('ds_speed')->nullable();
            $table->string('ds_snr')->nullable();
            $table->string('ds_annex')->nullable();
            $table->string('ds_power')->nullable();
            $table->string('tx_wavelength')->nullable();
            $table->string('errors_received')->nullable();
            $table->string('errors_sent')->nullable();
            $table->string('led_low_signal')->nullable();
            $table->string('signal_lvl_dbm')->nullable();
            $table->string('rx_power')->nullable();
            $table->string('tx_power')->nullable();
            $table->string('temperature')->nullable();
            $table->string('laser_wave_length')->nullable();
            $table->string('cat_TV')->nullable();
            $table->string('ont_distance')->nullable();
            $table->string('cat_tv_power')->nullable();
            $table->foreignId('interface_id')->nullable()->constrained('interfaces')->nullOnDelete();
            $table->string('tx_optical_signal')->nullable();
            $table->string('rx_optical_signal')->nullable();
            $table->string('rx_wavelength')->nullable();
            $table->timestamps();
        });

        // Interfaces table
        Schema::create('interfaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modem_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('index')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('speed')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('admin_status')->nullable();
            $table->string('operation_status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interfaces');
        Schema::dropIfExists('signals');
        Schema::dropIfExists('palet_activities');
        Schema::dropIfExists('box_activities');
        Schema::dropIfExists('modem_activities');
        Schema::dropIfExists('tags');
    }
}
