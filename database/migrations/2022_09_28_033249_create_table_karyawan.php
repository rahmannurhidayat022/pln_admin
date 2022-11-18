<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nid')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->enum('status_kepegawaian', ['pjb', 'pjbs'])->nullable();
            $table->string('jabatan')->nullable();
            $table->string('bidang')->nullable();
            $table->string('bagian')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->bigInteger('telp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('agama')->nullable();
            $table->integer('usia')->nullable();
            $table->bigInteger('no_ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('bpjs_ketenagakerjaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_karyawan');
    }
};