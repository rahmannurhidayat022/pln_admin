<?php

namespace App\Imports;

use App\Models\TAD;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class TADImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TAD([
            'nama' => $row['nama_karyawan'],
            'no_ktp' => $row['nomor_ktp'],
            'npwp' => $row['npwp'],
            'bpjs_kesehatan' => $row['bpjs_kesehatan'],
            'bpjs_ketenagakerjaan' => $row['bpjs_ketenagakerjaan'],
            'kelamin' => $row['jenis_kelamin'],
            'agama' => $row['agama'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'tempat_lahir' => $row['tempat_lahir'],
            'usia' => $row['usia'],
            'alamat' => $row['alamat'],
            'mkp' => $row['mulai_masuk_mkp'],
            'masa_kerja' => $row['masa_kerja'],
            'status_kontrak' => $row['status_kontrak'],
            'pendidikan' => $row['pendidikan_terakhir'],
            'jurusan' => $row['jurusan_pendidikan'],
            'jabatan' => $row['jabatan'],
            'bidang' => $row['bidang'],
            'posisi' => $row['posisi'],
        ]);
    }
}