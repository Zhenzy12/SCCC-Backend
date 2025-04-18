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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            // $table->string('time'); #time
            // $table->time('date_received')->nullable(); #date
            // $table->string('arrival_on_site'); #time
            $table->time('time'); #time
            $table->date('date_received')->nullable(); #date
            $table->time('arrival_on_site'); #time
            $table->string('name')->nullable();
            $table->string('landmark',255);
            $table->float('longitude',10,6);
            $table->float('latitude',10,6);
            $table->string('description',255)->nullable();
            $table->foreignId('source_id')->constrained('source')->onDelete('cascade');
            $table->foreignId('incident_id')->constrained('incident')->onDelete('cascade');
            $table->foreignId('barangay_id')->constrained('barangay')->onDelete('cascade');
            $table->foreignId('actions_id')->constrained('actions_taken')->onDelete('cascade'); #actions taken
            $table->foreignId('assistance_id')->constrained('type_of_assistance')->onDelete('cascade'); #type of assistance
            $table->foreignId('urgency_id')->constrained('urgency')->onDelete('cascade'); #urgency
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
