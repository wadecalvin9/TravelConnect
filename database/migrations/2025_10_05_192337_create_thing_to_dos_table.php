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
        Schema::create('thing_to_dos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('destination_id')->constrained()->onDelete('cascade')->nullable();
        $table->foreignId('tour_id')->constrained()->onDelete('cascade')->nullable();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('image')->nullable(); // image URL or local path
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thing_to_dos');
    }
};
