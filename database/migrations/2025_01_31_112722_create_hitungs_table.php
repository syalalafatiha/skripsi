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
        Schema::create('hitungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade')->index();
            $table->string('aspek_id');
            $table->foreign('aspek_id')->references('id')->on('aspeks');
            $table->string('kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriterias');
            $table->string('sub_kriteria_id');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriterias');
            $table->integer('nilai');
            $table->integer('nilai_target')->nullable();
            $table->integer('gap')->nullable();
            $table->decimal('bobot_gap', 10, 2)->nullable();
            $table->decimal('core_factor', 10, 2)->nullable();
            $table->decimal('secondary_factor', 10, 2)->nullable();
            $table->decimal('nilai_total', 10, 2)->nullable();
            $table->decimal('rangking')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitungs');
    }
};
