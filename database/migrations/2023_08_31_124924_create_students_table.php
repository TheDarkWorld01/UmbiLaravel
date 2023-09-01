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
        Schema::create('students', function (Blueprint $table) {
            // $table->id();
            $table->char('id_mahasiswa',10);
            $table->string('nama_mahasiswa',100);
            $table->enum('gender',['L','P']);
            $table->string('alamat',150);
            $table->enum('jurusan',['TI','SI','TK','MI']);
            $table->char('angkatan',10);
            $table->primary('id_mahasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
