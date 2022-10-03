<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\KaryawanImport;
use App\Imports\TADImport;
use App\Models\Karyawan;
use App\Models\TAD;
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

    public function detailKaryawan(Request $request, $id) {
        $category = $request->query('category');
        if ($category == 'karyawan') {
            $res = Karyawan::find($id);
            return view('pages/detail_karyawan', compact('res'));
        }
        if ($category == 'tad') {
            $res = TAD::find($id);
            return view('pages/detail_karyawan', compact('res'));
        }

        return redirect()->back();
    }

    public function formKaryawan(Request $request, $id) {
        $category = $request->query('category');
        if ($category == 'karyawan') {
            $res = Karyawan::find($id);
            return view('pages/edit_karyawan', compact('res'));
        }

        if ($category == 'tad') {
            $res = TAD::find($id);
            return view('pages/edit_karyawan', compact('res'));
        }

        return redirect()->back();
    }

    public function editKaryawan(Request $request, $id) {
        $category = $request->query('category');
        try {
            if ($category == 'karyawan') {
                $res = Karyawan::find($id);
                $res->nid = $request->nid;
                $res->nama = $request->nama;
                $res->kelamin = $request->kelamin;
                $res->tempat_lahir = $request->tempat_lahir;
                $res->tanggal_lahir = $request->tanggal_lahir;
                $res->pendidikan = $request->pendidikan;
                $res->status_kepegawaian = $request->status_kepegawaian;
                $res->jabatan = $request->jabatan;
                $res->bagian = $request->bagian;
                $res->bidang = $request->bidang;
                $res->jurusan = $request->jurusan;
                $res->telp = $request->telp;
                $res->email = $request->email;
                $res->alamat = $request->alamat;
                $res->agama = $request->agama;
                $res->no_ktp = $request->no_ktp;
                $res->npwp = $request->npwp;
                $res->bpjs_kesehatan = $request->bpjs_kesehatan;
                $res->bpjs_ketenagakerjaan = $request->bpjs_ketenagakerjaan;
                $res->update();

                Session::flash('success', 'Data berhasil diperbaharui');
                return redirect('/data/karyawan');
            }

            if ($category == 'tad') {
                $res = TAD::find($id);
                $res->nama = $request->nama;
                $res->kelamin = $request->kelamin;
                $res->tempat_lahir = $request->tempat_lahir;
                $res->tanggal_lahir = $request->tanggal_lahir;
                $res->pendidikan = $request->pendidikan;
                $res->status_kontrak = $request->status_kontrak;
                $res->jabatan = $request->jabatan;
                $res->posisi = $request->posisi;
                $res->bidang = $request->bidang;
                $res->jurusan = $request->jurusan;
                $res->usia = $request->usia;
                $res->alamat = $request->alamat;
                $res->agama = $request->agama;
                $res->mkp = $request->mkp;
                $res->masa_kerja = $request->masa_kerja;
                $res->no_ktp = $request->no_ktp;
                $res->npwp = $request->npwp;
                $res->bpjs_kesehatan = $request->bpjs_kesehatan;
                $res->bpjs_ketenagakerjaan = $request->bpjs_ketenagakerjaan;
                $res->update();

                Session::flash('success', 'Data berhasil diperbaharui');
                return redirect('/data/tad');
            }

            return;
        } catch (\Throwable $th) {
            if ($category == 'karyawan') {
                Session::flash('failed', 'Data gagal diperbaharui');
                return redirect('/data/karyawan');
            }

            if ($category == 'tad') {
                Session::flash('failed', 'Data gagal diperbaharui');
                return redirect('/data/tad');
            }
        }
    }

    public function getChartData() {
        try {
            $karyawanFilteredByPjb_L = Karyawan::where('tipe_karyawan', '=', 'PJB')->where('jenis_kelamin', '=', 'laki-laki')->count();
            $karyawanFilteredByPjb_P = Karyawan::where('tipe_karyawan', '=', 'PJB')->where('jenis_kelamin', '=', 'perempuan')->count();
            $karyawanFilteredByPjbs_L = Karyawan::where('tipe_karyawan', '=', 'PJBS')->where('jenis_kelamin', '=', 'laki-laki')->count();
            $karyawanFilteredByPjbs_P = Karyawan::where('tipe_karyawan', '=', 'PJBS')->where('jenis_kelamin', '=', 'perempuan')->count();
            $karyawanFilteredByTad_L = Karyawan::where('tipe_karyawan', '=', 'TAD')->where('jenis_kelamin', '=', 'laki-laki')->count();
            $karyawanFilteredByTad_P = Karyawan::where('tipe_karyawan', '=', 'TAD')->where('jenis_kelamin', '=', 'perempuan')->count();

            $sma = Karyawan::where('pendidikan', '=', 'SMA')->count();
            $smk = Karyawan::where('pendidikan', '=', 'SMK')->count();
            $ma = Karyawan::where('pendidikan', '=', 'MA')->count();
            $d1 = Karyawan::where('pendidikan', '=', 'D1')->count();
            $d2 = Karyawan::where('pendidikan', '=', 'D2')->count();
            $d3 = Karyawan::where('pendidikan', '=', 'D3')->count();
            $s1 = Karyawan::where('pendidikan', '=', 'S1')->count();
            $s2 = Karyawan::where('pendidikan', '=', 'S2')->count();
            $s3 = Karyawan::where('pendidikan', '=', 'S3')->count();


            return response()->json([
                    'pjb' => $karyawanFilteredByPjb,
                    'pjbs' => $karyawanFilteredByPjbs,
                    'tad' => $karyawanFilteredByTad,
                    'sma' => $sma,
                    'smk' => $smk,
                    'ma' => $ma,
                    'd1' => $d1,
                    'd2' => $d2,
                    'd3' => $d3,
                    's1' => $s1,
                    's2' => $s2,
                    's3' => $s3,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'message' => 'Gagal memuat data chart' ], 400);
        }
    }

    public function tad() {
        $tad = TAD::latest()->paginate(7);
        return view('pages/tad', compact('tad'));
    }

    public function importFileTAD(Request $request)
    {
        if ($request->file('file')) {
            $import = Excel::import(new TADImport, $request->file('file'));
            if ($import) {
                Session::flash('success', 'Data berhasil ditambahkan');
                return redirect('/data/tad');
            } else {
                Session::flash('failed', 'Data berhasil ditambahkan');
                return redirect('/data/tad');
            } 
        } else {
            return redirect('/data/karyawan')->with('info', 'Pilih file');
        }
    }
}