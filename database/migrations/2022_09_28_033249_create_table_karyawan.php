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
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan', 'lainnya'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->bigInteger('telp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('tipe_karyawan')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('grade')->nullable();
            $table->string('bidang')->nullable();
            $table->integer('unit')->nullable();
            $table->enum('status', ['aktif', 'pasif'])->nullable();
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