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
         Schema::table('students', function (Blueprint $table) {
         $table->unsignedBigInteger('track_id')->nullable();
            
            $table->foreign('track_id')
                ->references('id')->on('track')
                ->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
         $table->dropColumn('track_id');
    });
    }
};
