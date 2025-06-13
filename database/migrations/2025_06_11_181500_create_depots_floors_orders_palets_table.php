<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('total_palets')->nullable();
            $table->json('meta')->nullable();
            $table->string('pack')->nullable();
            $table->string('priority')->nullable();
            $table->string('voip')->nullable();
            $table->foreignId('model_id')->nullable()->constrained('models');
            $table->foreignId('model_version_id')->nullable()->constrained('model_versions');
            $table->string('tags')->nullable();
            $table->date('deadline_date')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('client_id')->nullable()->constrained();
            $table->string('client_address')->nullable();
            $table->string('firmware')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('freight', 8, 2)->nullable();
            $table->decimal('height_palet', 8, 2)->nullable();
            $table->string('type_of_glue')->nullable();
            $table->boolean('lan_cable')->nullable();
            $table->boolean('power_supply')->nullable();
            $table->boolean('hdmi')->nullable();
            $table->boolean('remote_control')->nullable();
            $table->boolean('logo_removal')->nullable();
            $table->text('comment')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->decimal('lan_cost', 8, 2)->nullable();
            $table->decimal('psu_cost', 8, 2)->nullable();
            $table->decimal('refurbishment_cost', 8, 2)->nullable();
            $table->decimal('transport_customer_cost', 8, 2)->nullable();
            $table->decimal('transport_outgoing_cost', 8, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('palets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('total_boxes');
            $table->json('meta')->nullable();
            $table->foreignId('truck_id')->nullable()->constrained();
            $table->string('vendor_palet_id')->nullable();
            $table->string('label')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('order_id')->nullable()->constrained();
            $table->string('type')->nullable();
            $table->string('version')->nullable();
            $table->foreignId('area_id')->nullable()->constrained();
            $table->timestamps();
        });



    }

    public function down(): void
    {
        Schema::dropIfExists('floors');
        Schema::dropIfExists('depots');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('palets');
    }
};
