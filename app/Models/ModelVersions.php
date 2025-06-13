<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('model_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('models');
            $table->string('hardware_version');
            $table->double('voltage')->nullable();
            $table->double('amperage')->nullable();
            $table->string('latest_firmware')->nullable();
            $table->timestamps();
            
            $table->unique(['model_id', 'hardware_version']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_versions');
    }
};