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
        Schema::table('inquiries', function (Blueprint $table) {
            // make sure the columns exist and are the right type
            $table->unsignedBigInteger('destination_id')->change();
            $table->unsignedBigInteger('tour_id')->change();

            // add foreign keys
            $table->foreign('destination_id')
                  ->references('id')->on('destinations')
                  ->onDelete('cascade');

            $table->foreign('tour_id')
                  ->references('id')->on('tours')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            //
        });
    }
};
