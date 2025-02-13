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
            $table->date('date received');
            $table->timestamp('arrival on site');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('source_id')->constrained('source')->onDelete('cascade');
            $table->foreignId('incident_id')->constrained('incident')->onDelete('cascade');
            $table->foreignId('barangay_id')->constrained('barangay')->onDelete('cascade');
            $table->foreignId('actions_id')->constrained('actions_taken')->onDelete('cascade'); #actions taken
            $table->foreignId('assistance_id')->constrained('type_of_assistance')->onDelete('cascade'); #type of assistance
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');}
};
