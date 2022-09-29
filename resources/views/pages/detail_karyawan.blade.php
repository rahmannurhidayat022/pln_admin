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
                    <h2 class="text-lg font-medium truncate mr-5">Data Karyawan</h2>
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
                                    {{$res->nama}} ({{$res->nid}})</div>
                                <div class="text-slate-500">{{$res->tempat_lahir}},
                                    {{$res->tanggal_lahir}}</div>
                                <div class="text-slate-500">Gender: {{$res->jenis_kelamin}}</div>

                            </div>
                        </div>
                        <div
                            class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-3">Kontak</div>
                            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Email: {{$res->email}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Telp: {{$res->telp}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Alamat: {{$res->alamat}}
                                </div>
                            </div>
                        </div>
                        <div
                            class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-3">Pekerjaan</div>
                            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Tipe Karyawan: {{$res->tipe_karyawan}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Jabatan: {{$res->jabatan}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Tanggal Masuk: {{$res->tanggal_masuk}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Grade: {{$res->grade}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Bidang: {{$res->bidang}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Unit: {{$res->unit}}
                                </div>
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    Status Karyawan: {{$res->status}}
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