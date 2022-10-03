@extends('../layout/' . $layout)

@section('subhead')
<title>Dashboard - PLN</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Chart</h2>
</div>
<div class="intro-y grid grid-cols-12 gap-6 mt-5">
    <div class="col-span-12 lg:col-span-6">
        <div class="intro-y box p-1 md:p-2 lg:p-5">
            <div class="h-[400px]">
                <canvas id="chart-jumlah-karyawan"></canvas>
            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-6">
        <div class="intro-y box p-1 md:p-2 lg:p-5">
            <div class="h-[400px]">
                <canvas id="chart-jumlah-karyawan-bygender"></canvas>
            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-6">
        <div class="intro-y box p-1 md:p-2 lg:p-5">
            <div class="h-[400px]">
                <canvas id="chart-data-pendidikan"></canvas>
            </div>
        </div>
    </div>
</div>
</div>
@endsection