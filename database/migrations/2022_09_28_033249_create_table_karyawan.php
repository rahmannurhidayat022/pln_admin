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
            //bidang
            $table->enum('bidang', ['UBJOM TANJUNG AWAR-AWAR', 'BIDANG ENJINIRING', 'BIDANG OPERASI', 'BIDANG PEMELIHARAAN', 'BIDANG LOGISTIK'])->nullable();
            // jabatan
            $table->enum('jabatan', 
            ['GENERAL MANAGER', 'MANAJER ENJINIRING & QA', 'SPV SENIOR SYSTEM OWNER TURBINE & AUX',
            'ASISTEN ENJINIR SO TURBINE & AUXILIARY', 'SPV SENIOR SYSTEM OWNER BOILER & AUX',
              'ASISTEN ENJINIR SO BOILER & AUXILIARY', 'SPV SENIOR SYSTEM OWNER COMMON AUX',
               'ASISTEN ENJINIR SO COMMON AUXILIARY', 'SPV SENIOR COMPONENT ANALYST',
                'ASISTEN ENJINIR COMPONENT ANALYST', 'SPV SENIOR CONDITION BASED MAINTENANCE',
                 'ASISTEN ENJINIR CBM', 'JUNIOR ENJINIR CBM', 'SPV SENIOR MANAJEMEN MUTU & KINERJA',
                  'ASISTEN ANALIS MANAJEMEN MUTU DAN KINERJA', 'SPV SENIOR MANAJEMEN RISIKO & KEPATUHAN',
                   'MANAJER OPERASI', 'SPV SENIOR RENDAL OPERASI', 'ASISTEN ANALIS RENDAL OPERASI',
                    'JUNIOR ANALIS RENDAL OPERASI', 'SPV SENIOR PRODUKSI A', 'ASISTEN OPERATOR PRODUKSI A',
                     'JUNIOR OPERATOR PRODUKSI A', 'SPV SENIOR PRODUKSI B',
                      'ASISTEN OPERATOR PRODUKSI B', 'SPV SENIOR PRODUKSI C', 'ASISTEN OPERATOR PRODUKSI C',
                       'JUNIOR OPERATOR PRODUKSI C', 'SPV SENIOR PRODUKSI D', 'ASISTEN OPERATOR PRODUKSI D',
                        'JUNIOR OPERATOR PRODUKSI D', 'SUPERVISOR COAL & ASH HANDLING A', 'JUNIOR OPERATOR COAL & ASH HANDLING A',
                         'SUPERVISOR COAL & ASH HANDLING B',
                          'JUNIOR OPERATOR PRODUKSI B', 
                           'SUPERVISOR COAL & ASH HANDLING C', 'JUNIOR OPERATOR COAL & ASH HANDLING B',
                            'JUNIOR OPERATOR COAL & ASH HANDLING C', 'ASISTEN OPERATOR COAL & ASH HANDLING C',
                             'SUPERVISOR COAL & ASH HANDLING D', 'JUNIOR OPERATOR COAL & ASH HANDLING D',
                              'ASISTEN ANALIS NIAGA & BAHAN BAKAR', 'JUNIOR ANALIS NIAGA & BAHAN BAKAR',
                               'SPV SENIOR KIMIA', 'ASISTEN ANALIS KIMIA & LAB', 'JUNIOR ANALIS KIMIA & LAB',
                                'MANAJER PEMELIHARAAN', 'SPV SENIOR RENDAL PEMELIHARAAN', 'ASISTEN ANALIS RENDAL PEMELIHARAAN',
                                 'JUNIOR ANALIS RENDAL PEMELIHARAAN', 'SPV SENIOR OUTAGE MANAGEMENT', 
                                 'ASISTEN ANALIS OUTAGE MANAGEMENT', 'SPV SENIOR HAR MESIN 1 (B,T & AAB)',
                                  'ASISTEN ENJINIR MESIN 1 BOILER, TURBIN & ALAT-ALAT BANTU',
                                   'JUNIOR ENJINIR MESIN 1 BOILER, TURBIN & ALAT-ALAT BANTU',
                                    'SPV SENIOR HAR MESIN 2 (SIST.BB & ABU)',
                                     'ASISTEN ENJINIR MESIN 2 SISTEM BAHAN BAKAR & ABU',
                                      'JUNIOR ENJINIR MESIN 2 SISTEM BAHAN BAKAR & ABU',
                                       'SPV SENIOR HAR LISTRIK', 'ASISTEN ENJINIR LISTRIK',
                                        'JUNIOR ENJINIR LISTRIK', 'ASISTEN ENJINIR KONTROL & INSTRUMEN',
                                         'JUNIOR ENJINIR KONTROL & INSTRUMEN', 'SPV SENIOR SARANA',
                                          'ASISTEN ANALIS SARANA', 'JUNIOR ANALIS SARANA',
                                           'SPV SENIOR LINGKUNGAN', 'ASISTEN ANALIS LINGKUNGAN',
                                            'JUNIOR ANALIS LINGKUNGAN', 'JUNIOR ANALIS K3',
                                             'MANAJER LOGISTIK', 'SPV SENIOR INVENTORI KTRL & KATALOGER',
                                              'ASISTEN OFFICER INVENTORY CONTROL & CATALOG',
                                               'JUNIOR OFFICER INVENTORY CONTROL & CATALOG', 'SPV SENIOR PENGADAAN',
                                                'ASISTEN OFFICER PENGADAAN', 'JUNIOR OFFICER PENGADAAN',
                                                 'SPV SENIOR ADMIN. GUDANG', 'JUNIOR OFFICER ADMINISTRASI GUDANG',
                                                  'MANAJER KEU & ADMIN',
                                                   'SPV SENIOR KEUANGAN', 'JUNIOR OFFICER KEUANGAN', 'SPV SENIOR SDM',
                                                    'ASISTEN OFFICER SUMBER DAYA MANUSIA', 'JUNIOR OFFICER SUMBER DAYA MANUSIA',
                                                     'SPV SENIOR UMUM & CSR', 'JUNIOR OFFICER UMUM & CSR', 'ASISTEN OFFICER UMUM & CSR'])->nullable();
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