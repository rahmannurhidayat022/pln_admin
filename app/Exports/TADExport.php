<?php

namespace App\Exports;

use App\Models\TAD;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TADExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TAD::select('nama','no_ktp', 'npwp', 'bpjs_kesehatan', 'bpjs_ketenagakerjaan', 'kelamin','agama','tempat_lahir', 'tanggal_lahir', 'usia', 'alamat', 'mkp', 'masa_kerja', 'status_kontrak', 'pendidikan', 'jurusan', 'jabatan', 'bidang', 'posisi')->get();
    }

    public function headings(): array
    {
        return [
            'NAMA_KARYAWAN',
            'NOMOR_KTP',
            'NPWP',
            'BPJS_KESEHATAN',
            'BPJS_KETENAGAKERJAAN',
            'JENIS_KELAMIN',
            'AGAMA',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'USIA',
            'ALAMAT',
            'MULAI_MASUK_MKP',
            'MASA_KERJA',
            'STATUS_KONTRAK',
            'PENDIDIKAN_TERAKHIR',
            'JURUSAN_PENDIDIKAN',
            'JABATAN',
            'BIDANG',
            'POSISI',
        ];
    }
}
