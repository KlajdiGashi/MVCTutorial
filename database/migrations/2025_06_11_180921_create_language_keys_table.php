<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('language_keys', function (Blueprint $table) {
            $table->string('key')->primary(); // Using key as primary key
            $table->text('value')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('language_keys');
    }
};
