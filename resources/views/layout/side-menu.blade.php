@extends('../layout/main')

@section('head')
@yield('subhead')
@endsection

@section('content')
@include('../layout/components/mobile-menu')
@include('../layout/components/top-bar')
<div class="wrapper">
    <div class="wrapper-box">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <ul>
                <!-- css untuk aktif nav = 'side-menu--active' -->
                <li>
                    <a href="/"
                        class="side-menu {{ Route::currentRouteName() === 'dashboard' ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="home" data-lucide="home" class="lucide lucide-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">
                            Dashboard
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"
                        class="side-menu {{ Route::currentRouteName() === 'karyawan' ? 'side-menu--active side-menu--open' : '' }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="users" data-lucide="users"
                                class="lucide lucide-users">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 010 7.75"></path>
                            </svg>
                        </div>
                        <div class="side-menu__title">
                            Data
                            <div class="side-menu__sub-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                                    class="lucide lucide-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <ul class="{{ Route::currentRouteName() === 'karyawan' ? 'side-menu__sub-open' : (Route::currentRouteName() === 'tad' ? 'side-menu__sub-open' : (Route::currentRouteName() === 'karyawan.detail' ? 'side-menu__sub-open' : '')) }}"
                        style="display: {{ Route::currentRouteName() === 'karyawan' ? 'block' : (Route::currentRouteName() === 'tad' ? 'block' : (Route::currentRouteName() === 'karyawan.detail' ? 'block' : 'none')) }};">
                        <li>
                            <a href="{{url('data/bidang')}}" class="side-menu">
                                <div class="side-menu__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                        class="lucide lucide-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
                                </div>
                                <div class="side-menu__title">
                                    Bidang
                                </div>
                            </a>
                            <a href="{{url('data/jabatan')}}" class="side-menu">
                                <div class="side-menu__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                        class="lucide lucide-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
                                </div>
                                <div class="side-menu__title">
                                    Jabatan
                                </div>
                            </a>
                            <a href="{{url('data/karyawan')}}" class="side-menu">
                                <div class="side-menu__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                        class="lucide lucide-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
                                </div>
                                <div class="side-menu__title">
                                    Karyawan
                                </div>
                            </a>
                            <a href="{{url('data/tad')}}" class="side-menu">
                                <div class="side-menu__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                        class="lucide lucide-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
                                </div>
                                <div class="side-menu__title">
                                    TAD
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
</div>
@endsection