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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique()->nullable();
        $table->string('password');
        $table->string('phone_number')->nullable();
        $table->string('rfid')->nullable();
        $table->string('status')->default('active');
        $table->foreignId('model_id')->nullable()->constrained('device_models')->onDelete('set null');
        $table->foreignId('language_id')->nullable()->constrained('languages')->onDelete('set null');
        $table->string('image_url')->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->rememberToken();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
