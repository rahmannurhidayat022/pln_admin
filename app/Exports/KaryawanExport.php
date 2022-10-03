<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KaryawanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //get selection data karyawans
        return Karyawan::select('nama','nid', 'status_kepegawaian', 'jabatan', 'bidang', 'bagian', 'pendidikan', 'jurusan', 'tempat_lahir', 'tanggal_lahir', 'telp', 'email', 'alamat', 'kelamin', 'agama', 'usia', 'no_ktp', 'npwp', 'bpjs_kesehatan', 'bpjs_ketenagakerjaan')->get();
    }

    public function headings(): array
    {
        return [
            'NAMA_KARYAWAN',
            'NID',
            'STATUS_KEPEGAWAIAN',
            'JABATAN',
            'BIDANG',
            'BAGIAN',
            'PENDIDIKAN',
            'JURUSAN',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'TELP',
            'EMAIL',
            'ALAMAT',
            'KELAMIN',
            'AGAMA',
            'USIA',
            'NOMOR_KTP',
            'NOMOR_NPWP',
            'NOMOR_BPJS_KESEHATAN',
            'NOMOR_BPJS_KETENAGAKERJAAN',
        ];
    }
}
