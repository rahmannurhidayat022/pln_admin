@extends('../layout/' . $layout)

@section('subhead')
<title>Detail karyawan</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Edit Data Karyawan</h2>
                </div>
                <div class="intro-y box px-5 pt-5 mt-5">
                    <form class="py-10"
                        action="{{ url('/edit/karyawan/'.$res->id.'?category='.Request::query('category')) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-4">
                            @if(Request::query('category') == 'karyawan')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="nid" class="form-label">NID</label>
                                    <input value="{{ $res->nid }}" type="text" name="nid" id="nid" class="form-control">
                                </div>
                            </div>
                            @endif
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input value="{{ $res->nama }}" type="text" name="nama" id="nama"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label>Jenis Kelamin</label>
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="form-check mr-2">
                                            <input id="laki-laki" class="form-check-input" type="radio" name="kelamin"
                                                value="laki-laki" {{ ($res->kelamin == 'laki-laki') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input id="perempuan" class="form-check-input" type="radio" name="kelamin"
                                                value="perempuan" {{ ($res->kelamin == 'perempuan') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <input value="{{$res->agama}}" type="text" name="agama" id="agama"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="usia" class="form-label">Usia</label>
                                    <input value="{{$res->usia}}" type="number" name="usia" id="usia"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="no_ktp" class="form-label">No KTP</label>
                                    <input value="{{ $res->no_ktp }}" type="number" name="no_ktp" id="no_ktp"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="npwp" class="form-label">NPWP</label>
                                    <input value="{{ $res->npwp }}" type="text" name="npwp" id="npwp"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="bpjs_kesehatan" class="form-label">BPJS Kesehatan</label>
                                    <input value="{{ $res->bpjs_kesehatan }}" type="text" name="bpjs_kesehatan"
                                        id="bpjs_kesehatan" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="bpjs_ketenagakerjaan" class="form-label">BPJS Ketenagakerjaan</label>
                                    <input value="{{ $res->bpjs_ketenagakerjaan }}" type="text"
                                        name="bpjs_ketenagakerjaan" id="bpjs_ketenagakerjaan" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input value="{{ $res->tempat_lahir }}" type="text" name="tempat_lahir"
                                        id="tempat_lahir" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input value="{{ $res->tanggal_lahir }}" type="date" name="tanggal_lahir"
                                        id="tanggal_lahir" class="form-control">
                                </div>
                            </div>
                            @if(Request::query('category') == 'tad')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <label for="status_kepegawaian" class="form-label">Status Kepegawaian</label>
                                <input value="{{ $res->status_kontrak }}" type="text" name="status_kontrak"
                                    id="status_kontrak" class="form-control">
                            </div>
                            @endif
                            @if(Request::query('category') == 'karyawan')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <label for="status_kontrak" class="form-label">Status Kontrak</label>
                                <select id="status_kontrak" name="status_kontrak" class="form-select mt-2 sm:mr-2">
                                    <option value="PJB" {{ ($res->status_kontrak == 'pjb') ? 'selected' : ''}}>PJB
                                    </option>
                                    <option value="PJBS" {{ ($res->status_kontrak == 'pjbs') ? 'selected' : ''}}>
                                        PJBS
                                    </option>
                                </select>
                            </div>
                            @endif
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                                <select id="pendidikan" name="pendidikan" class="form-select mt-2 sm:mr-2">
                                    <option value="SMA" {{ ($res->pendidikan) == 'SMA' ? 'selected' : ''}}>SMA
                                    </option>
                                    <option value="SMK" {{ ($res->pendidikan) == 'SMK' ? 'selected' : ''}}>SMK
                                    </option>
                                    <option value="MA" {{ ($res->pendidikan) == 'MA' ? 'selected' : ''}}>MA
                                    </option>
                                    <option value="D3" {{ ($res->pendidikan) == 'D3' ? 'selected' : ''}}>Diploma III
                                    </option>
                                    <option value="S1" {{ ($res->pendidikan) == 'S1' ? 'selected' : ''}}>Strata I
                                    </option>
                                    <option value="S2" {{ ($res->pendidikan) == 'S2' ? 'selected' : ''}}>Strata II
                                    </option>
                                </select>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input value="{{$res->jurusan}}" type="text" name="jurusan" id="jurusan"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input value="{{$res->jabatan}}" type="text" name="jabatan" id="jabatan"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="bidang" class="form-label">Bidang</label>
                                    <input value="{{$res->bidang}}" type="text" name="bidang" id="bidang"
                                        class="form-control">
                                </div>
                            </div>
                            @if(Request::query('category') == 'tad')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="mkp" class="form-label">Mulai Masuk MKP</label>
                                    <input value="{{$res->mkp}}" type="date" name="mkp" id="mkp" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="masa_kerja" class="form-label">Masa Kerja</label>
                                    <input value="{{$res->masa_kerja}}" type="date" name="masa_kerja" id="masa_kerja"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="posisi" class="form-label">Posisi</label>
                                    <input value="{{$res->posisi}}" type="text" name="posisi" id="posisi"
                                        class="form-control">
                                </div>
                            </div>
                            @endif
                            @if(Request::query('category') == 'karyawan')
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="bagian" class="form-label">Bagian</label>
                                    <input value="{{$res->bagian}}" type="text" name="bagian" id="bagian"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input value="{{$res->email}}" type="text" name="email" id="unit"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-2">
                                <div class="mt-3">
                                    <label for="telp" class="form-label">No Telp</label>
                                    <input value="{{$res->telp}}" type="number" name="telp" id="telp"
                                        class="form-control">
                                </div>
                            </div>
                            @endif
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea rows="5" name="alamat" id="alamat"
                                        class="form-control">{{$res->alamat}}</textarea>
                                </div>
                            </div>
                            <div class="col-span-12 mt-3">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection