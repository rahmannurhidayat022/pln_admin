<?php

namespace App\Imports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class KaryawanImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        // var_dump($row);
        // \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject()
        return new Karyawan([
            'nama' => $row['nama_karyawan'],
            'nid' => $row['nid'],
            'status_kepegawaian' => $row['status_kepegawaian'],
            'jabatan' => $row['jabatan'],
            'bidang' => $row['bidang'],
            'bagian' => $row['bagian'],
            'pendidikan' => $row['pendidikan'],
            'jurusan' => $row['jurusan'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => \Carbon\Carbon::parse($row['tanggal_lahir'])->format('Y-m-d H:i:s'),
            'telp' => $row['telp'],
            'email' => $row['email'],
            'alamat' => $row['alamat'],
            'kelamin' => $row['kelamin'],
            'agama' => $row['agama'],
            'usia' => $row['usia'],
            'no_ktp' => $row['nomor_ktp'],
            'npwp' => $row['nomor_npwp'],
            'bpjs_kesehatan' => $row['nomor_bpjs_kesehatan'],
            'bpjs_ketenagakerjaan' => $row['nomor_bpjs_ketenagakerjaan'],
        ]);
    }
}