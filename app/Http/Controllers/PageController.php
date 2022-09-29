<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\KaryawanImport;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Session;
use Excel;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages/dashboard');
    }

    public function karyawan_view()
    {
        $datas = Karyawan::latest()->paginate(7);
        return view('pages/karyawan', [ 'karyawans' => $datas ]);
    }

    public function importFile(Request $request)
    {
        if ($request->file('file')) {
            $import = Excel::import(new KaryawanImport, $request->file('file'));
            if ($import) {
                Session::flash('success', 'Data berhasil ditambahkan');
                return redirect('/data/karyawan');
            } else {
                Session::flash('failed', 'Data berhasil ditambahkan');
                return redirect('/data/karyawan');
            } 
        } else {
            return redirect('/data/karyawan')->with('info', 'Pilih file');
        }
    }

    public function removeRecord($id)
    {
        $res = Karyawan::find($id)->delete();
        if (!$res) {
            Session::flash('failed', 'Data gagal dihapus');
            return redirect('/data/karyawan');
        }
        Session::flash('success', 'Data berhasil dihapus');
        return redirect('/data/karyawan');
    }

    public function detailKaryawan($id) {
        $res = Karyawan::find($id);
        return view('pages/detail_karyawan', compact('res'));
    }

    public function formKaryawan($id) {
        $res = Karyawan::find($id);
        return view('pages/edit_karyawan', compact('res'));
    }

    public function editKaryawan(Request $request, $id) {
        try {
            $res = Karyawan::find($id);
            $res->nid = $request->nid;
            $res->nama = $request->nama;
            $res->jenis_kelamin = $request->jenis_kelamin;
            $res->tempat_lahir = $request->tempat_lahir;
            $res->tanggal_lahir = $request->tanggal_lahir;
            $res->pendidikan = $request->pendidikan;
            $res->tipe_karyawan = $request->tipe_karyawan;
            $res->jabatan = $request->jabatan;
            $res->grade = $request->grade;
            $res->bidang = $request->bidang;
            $res->unit = $request->unit;
            $res->tanggal_masuk = $request->tanggal_masuk;
            $res->telp = $request->telp;
            $res->alamat = $request->alamat;
            $res->status = $request->status;
            $res->update();

            Session::flash('success', 'Data berhasil diperbaharui');
            return redirect('/data/karyawan');
        } catch (\Throwable $th) {
            Session::flash('failed', 'Data gagal diperbaharui');
            return redirect('/data/karyawan');
        }
    }
}