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
        Schema::create('tad', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('bidang')->nullable();
            $table->string('posisi')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('agama')->nullable();
            $table->integer('usia')->nullable();
            $table->bigInteger('no_ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('bpjs_ketenagakerjaan')->nullable();
            $table->date('mkp')->nullable();
            $table->date('masa_kerja')->nullable();
            $table->string('status_kontrak')->nullable();
            //pt enum Mitra Karya, Mitra Karya Pratama, Mitra Karya Utama, Mitra Karya Utama Pratama
            $table->enum('pt', ['Mitra Karya Prima', 'Brion Bara Indonesia', 'Kaka Sasmita Wijaya', 'Gunung Mas Jaya Tuban', 'Sentinel Cakra Buana', 'Tanjung Utama Sakti', 'Swabina Gatra'])->nullable();
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
        Schema::dropIfExists('tad');
    }
};