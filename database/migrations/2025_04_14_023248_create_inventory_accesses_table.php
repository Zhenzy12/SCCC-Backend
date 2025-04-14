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
        Schema::create('inventory_accesses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('for_dashboard')->default(true);
            $table->boolean('for_categories')->default(true);
            $table->boolean('for_borrowers')->default(true);
            $table->boolean('for_users')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_accesses');
    }
};
