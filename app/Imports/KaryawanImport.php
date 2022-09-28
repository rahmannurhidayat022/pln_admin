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
        return new Karyawan([
            'nid' => $row['nid'],
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']),
            'telp' => $row['telp'],
            'email' => $row['email'],
            'alamat' => $row['alamat'],
            'pendidikan' => $row['pendidikan'],
            'tipe_karyawan' => $row['tipe_karyawan'],
            'tanggal_masuk' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_masuk']),
            'jabatan' => $row['jabatan'],
            'grade' => $row['grade'],
            'bidang' => $row['bidang'],
            'unit' => $row['unit'],
            'status' => $row['status']
        ]);
    }
}