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
        Schema::create('kriterias', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('aspek_id');
            $table->foreign('aspek_id')->references('id')->on('aspeks');
            $table->string('kriteria');
            $table->enum('factor', ['Core', 'Secondary'])->default('Secondary');
            $table->integer('nilai_target');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};
