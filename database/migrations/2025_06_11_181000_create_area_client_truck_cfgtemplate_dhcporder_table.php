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
        Schema::create('depots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('depot_id')->constrained();
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->foreignId('floor_id')->constrained()->onDelete('cascade');
        $table->integer('max_nr_of_palets')->nullable();
        $table->text('comment')->nullable();
        $table->timestamps();
    });

    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('location')->nullable();
        $table->string('phone_number')->nullable();
        $table->string('email')->nullable();
        $table->timestamps();
    });

    Schema::create('trucks', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('license_plate')->nullable();
        $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
        $table->enum('type', ['inbound', 'outbound'])->default('inbound');
        $table->string('cmr')->nullable();
        $table->string('invoice_no')->nullable();
        $table->foreignId('invoice_company_id')->nullable()->constrained('clients')->nullOnDelete();
        $table->foreignId('supplier_company_id')->nullable()->constrained('clients')->nullOnDelete();
        $table->string('country_of_arrival')->nullable();
        $table->date('departure_date')->nullable();
        $table->date('arrival_date')->nullable();
        $table->string('dud_no')->nullable();
        $table->decimal('transport_cost', 10, 2)->nullable();
        $table->string('company_phone_no')->nullable();
        $table->string('driver_name')->nullable();
        $table->string('driver_phone_no')->nullable();
        $table->string('destination')->nullable();
        $table->string('duration_of_arrival')->nullable();
        $table->string('regime')->nullable();
        $table->timestamps();
    });

    Schema::create('cfg_templates', function (Blueprint $table) {
        $table->id();
        $table->string('label');
        $table->foreignId('model_id')->constrained('models')->onDelete('cascade');
        $table->text('docsis')->nullable();
        $table->text('mta')->nullable();
        $table->timestamps();
    });

    Schema::create('dhcp_orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained()->onDelete('cascade');
        $table->boolean('active')->default(false);
        $table->string('label');
        $table->foreignId('cfg_template_id')->nullable()->constrained('cfg_templates')->nullOnDelete();
        $table->string('firmware_update')->nullable();
        $table->timestamps();
    });

    // these SHOULD work like this, will be checked on tomorrow for reassurence tho.
    // Some of these might not even be needed in the future but oh well, better to have them if we ever need them.



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('cfg_templates');
        Schema::dropIfExists('dhcp_orders');
    }
};
