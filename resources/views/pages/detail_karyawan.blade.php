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
                    <h2 class="text-lg font-medium truncate mr-5">Detail Karyawan</h2>
                </div>
                <div class="intro-y box px-5 pt-5 mt-5">
                    <div
                        class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                                <img alt="Midone - HTML Admin Template" class="rounded-full"
                                    src="https://img.icons8.com/external-others-inmotus-design/541/000000/external-Avatar-round-icons-others-inmotus-design-5.png">
                            </div>
                            <div class="ml-5">
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                                    {{$res->nama}}</div>
                                <div class="text-slate-500">Tempat Tanggal Lahir: {{$res->tempat_lahir}},
                                    {{\Carbon\Carbon::parse($res->tanggal_lahir)->format('d-m-Y')}}</div>
                                <div class="text-slate-500">Agama: {{$res->agama}}</div>
                                <div class="text-slate-500">Jenis Kelamin: {{$res->kelamin}}</div>
                                <div class="text-slate-500">Pendidikan: {{$res->pendidikan}}</div>
                                <div class="text-slate-500">Jurusan: {{$res->jurusan}}</div>
                                <div class="text-slate-500">Alamat: {{$res->alamat}}</div>

                            </div>
                        </div>
                        <div
                            class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-3">Informasi</div>
                            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Email: {{$res->email}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Telp: {{$res->telp}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">NID: {{$res->nid}}</div>
                                <div class="truncate sm:whitespace-normal flex items-center">NIK: {{$res->no_ktp}}</div>
                                <div class="truncate sm:whitespace-normal flex items-center">NPWP: {{$res->npwp}}</div>
                                <div class="truncate sm:whitespace-normal flex items-center">BPJS Kesehataan:
                                    {{$res->bpjs_kesehatan}}</div>
                                <div class="truncate sm:whitespace-normal flex items-center">BPJS Ketenagakerjaan:
                                    {{$res->bpjs_ketenagakerjaan}}</div>
                            </div>
                        </div>
                        <div
                            class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-3">Pekerjaan</div>
                            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Status Kepegawaian: {{$res->status_kepegawaian}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Jabatan: {{$res->jabatan}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Bidang: {{$res->bidang}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    bagian: {{$res->bagian}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Bidang: {{$res->bidang}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection