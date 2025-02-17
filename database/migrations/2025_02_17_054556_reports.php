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
            $table->time('time');
            $table->date('date_received')->nullable();
            $table->time('arrival_on_site');
            $table->string('name')->nullable();
            $table->foreignId('source_id')->constrained('source')->onDelete('restrict');
            $table->foreignId('incident_id')->constrained('incident')->onDelete('restrict');
            $table->foreignId('location_id')->constrained('locations')->onDelete('restrict');
            $table->foreignId('actions_id')->constrained('actions_taken')->onDelete('restrict'); #actions taken
            $table->foreignId('assistance_id')->constrained('type_of_assistance')->onDelete('cascade'); #type of assistance
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
