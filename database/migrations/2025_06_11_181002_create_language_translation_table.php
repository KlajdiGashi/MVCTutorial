<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('language_translations', function (Blueprint $table) {
            $table->id();
            $table->string('key_id');
            $table->foreignId('language_id')->constrained('languages');
            $table->text('value')->nullable();
            
            $table->unique(['key_id', 'language_id']);
            
            $table->foreign('key_id')
                  ->references('key')
                  ->on('language_keys')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('language_translations');
    }
};