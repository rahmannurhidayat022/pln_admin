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
                    <form class="py-10" action="{{ route('formKaryawan.put', $res->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-12 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="nid" class="form-label">NID</label>
                                    <input value="{{ $res->nid }}" type="text" name="nid" id="nid" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input value="{{ $res->nama }}" type="text" name="nama" id="nama"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label>Jenis Kelamin</label>
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="form-check mr-2">
                                            <input id="laki-laki" class="form-check-input" type="radio"
                                                name="jenis_kelamin" value="laki-laki"
                                                {{ ($res->jenis_kelamin == 'laki-laki') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input id="perempuan" class="form-check-input" type="radio"
                                                name="jenis_kelamin" value="perempuan"
                                                {{ ($res->jenis_kelamin == 'perempuan') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input id="lainnya" class="form-check-input" type="radio"
                                                name="jenis_kelamin" value="lainnya"
                                                {{ ($res->jenis_kelamin == 'lainnya') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="lainnya">Lainnya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input value="{{ $res->tempat_lahir }}" type="text" name="tempat_lahir"
                                        id="tempat_lahir" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input value="{{ $res->tanggal_lahir }}" type="date" name="tanggal_lahir"
                                        id="tanggal_lahir" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                                <select id="pendidikan" name="pendidikan" class="form-select mt-2 sm:mr-2">
                                    <option value="SMA" {{ ($res->pendidikan) == 'SMA' ? 'selected' : ''}}>SMA
                                    </option>
                                    <option value="SMK" {{ ($res->pendidikan) == 'SMK' ? 'selected' : ''}}>SMK
                                    </option>
                                    <option value="MA" {{ ($res->pendidikan) == 'MA' ? 'selected' : ''}}>MA
                                    </option>
                                    <option value="D1" {{ ($res->pendidikan) == 'D1' ? 'selected' : ''}}>Diploma I
                                    </option>
                                    <option value="D2" {{ ($res->pendidikan) == 'D2' ? 'selected' : ''}}>Diploma II
                                    </option>
                                    <option value="D3" {{ ($res->pendidikan) == 'D3' ? 'selected' : ''}}>Diploma III
                                    </option>
                                    <option value="S1" {{ ($res->pendidikan) == 'S1' ? 'selected' : ''}}>Strata I
                                    </option>
                                    <option value="S2" {{ ($res->pendidikan) == 'S2' ? 'selected' : ''}}>Strata II
                                    </option>
                                    <option value="S3" {{ ($res->pendidikan) == 'S3' ? 'selected' : ''}}>Strata III
                                    </option>
                                </select>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <label for="tipe_karyawan" class="form-label">Tipe Karyawan</label>
                                <select id="tipe_karyawan" name="tipe_karyawan" class="form-select mt-2 sm:mr-2">
                                    <option value="PJB" {{ ($res->tipe_karyawan === 'PJB') ? 'selected' : ''}}>PJB
                                    </option>
                                    <option value="PJBS" {{ ($res->tipe_karyawan === 'PJBS') ? 'selected' : ''}}>PJBS
                                    </option>
                                    <option value="TAD" {{ ($res->tipe_karyawan === 'TAD') ? 'selected': '' }}>TAD
                                    </option>
                                </select>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input value="{{$res->jabatan}}" type="text" name="jabatan" id="jabatan"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="grade" class="form-label">Grade</label>
                                    <input value="{{$res->grade}}" type="text" name="grade" id="grade"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="bidang" class="form-label">Bidang</label>
                                    <input value="{{$res->bidang}}" type="text" name="bidang" id="bidang"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input value="{{$res->unit}}" type="number" name="unit" id="unit"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input value="{{$res->tanggal_masuk}}" type="date" name="tanggal_masuk"
                                        id="tanggal_masuk" class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label for="telp" class="form-label">No Telp</label>
                                    <input value="{{$res->telp}}" type="number" name="telp" id="telp"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-8">
                                <div class="mt-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea span="50" name="alamat" id="alamat" class="form-control">
                                    {{$res->alamat}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4">
                                <div class="mt-3">
                                    <label>Jenis Kelamin</label>
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="form-check mr-2">
                                            <input id="aktif" class="form-check-input" type="radio" name="status"
                                                value="aktif" {{ ($res->status == 'aktif') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="aktif">Aktif</label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input id="pasif" class="form-check-input" type="radio" name="status"
                                                value="pasif" {{ ($res->status == 'pasif') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="pasif">Pasif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 mt-3">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection