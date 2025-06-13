<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade');
            $table->string('name');
            $table->string('device_type')->nullable();
            $table->integer('serial_number_length')->nullable();
            $table->string('docsis_version')->nullable();
            $table->boolean('scqam_downstream_compatibility')->default(false);
            $table->boolean('scqam_upstream_compatibility')->default(false);
            $table->boolean('ofdm_downstream_compatibility')->default(false);
            $table->boolean('ofdm_upstream_compatibility')->default(false);
            $table->boolean('wifi2g')->default(false);
            $table->boolean('wifi5g')->default(false);
            $table->boolean('telephony')->default(false);
            $table->integer('download_min_speed')->nullable();
            $table->integer('upload_min_speed')->nullable();
            $table->boolean('lan1')->default(false);
            $table->boolean('lan2')->default(false);
            $table->boolean('lan3')->default(false);
            $table->boolean('lan4')->default(false);
            $table->string('image_url')->nullable();
            $table->boolean('show_on_user_management')->default(false);
            $table->string('tariff_number')->nullable();
            $table->boolean('cat_tv_compatibility')->default(false);
            $table->decimal('cat_tv_power_min', 5, 2)->nullable();
            $table->decimal('cat_tv_power_max', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
