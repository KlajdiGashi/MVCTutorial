<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_box_id')->nullable();
            $table->string('label')->nullable();
            
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('total_modems')->default(0);
            
            $table->foreignId('palet_id')->nullable()->constrained('palets')->onDelete('set null');
            $table->string('type')->nullable(); // enum as string

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('boxes');
    }
};
