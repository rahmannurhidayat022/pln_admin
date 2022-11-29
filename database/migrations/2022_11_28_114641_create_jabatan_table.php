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
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jabatan')->unique();
            $table->string('nama_jabatan');
            $table->enum('jenjang', ['MA', 'MM', 'MD', 'SPV-A', 'SPV-D', 'F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'Helper']);
            $table->enum('superior', ['GENERAL MANAGER', 'MANAJER ENJINIRING & QA', 'SPV SENIOR SYSTEM OWNER TURBINE & AUX', 'SPV SENIOR SYSTEM OWNER BOILER & AUX', 'SPV SENIOR SYSTEM OWNER COMMON AUX', 'SPV SENIOR COMPONENT ANALYST' ,'SPV SENIOR CONDITION BASED MAINTENANCE', 'SPV SENIOR MANAJEMEN MUTU & KINERJA', 'SPV SENIOR MANAJEMEN RISIKO & KEPATUHAN', 'MANAJER OPERASI', 'SPV SENIOR RENDAL OPERASI', 'SPV SENIOR PRODUKSI A','SPV SENIOR PRODUKSI B','SPV SENIOR PRODUKSI C','SPV SENIOR PRODUKSI D','SUPERVISOR COAL & ASH HANDLING A','SUPERVISOR COAL & ASH HANDLING B','SUPERVISOR COAL & ASH HANDLING C','SUPERVISOR COAL & ASH HANDLING D','SPV SENIOR KIMIA','MANAJER PEMELIHARAAN','SPV SENIOR RENDAL PEMELIHARAAN','SPV SENIOR HAR MESIN 1 (B,T & AAB)','SPV SENIOR HAR MESIN 2 (SIST.BB & ABU)','SPV SENIOR HAR LISTRIK','SPV SENIOR SARANA','SPV SENIOR LINGKUNGAN','MANAJER LOGISTIK', 'SPV SENIOR INVENTORI KTRL & KATALOGER', 'SPV SENIOR PENGADAAN', 'SPV SENIOR ADMIN. GUDANG', 'MANAJER KEU & ADMIN', 'SPV SENIOR KEUANGAN', 'SPV SENIOR SDM', 'SPV SENIOR UMUM & CSR']);
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
        Schema::dropIfExists('jabatan');
    }
};