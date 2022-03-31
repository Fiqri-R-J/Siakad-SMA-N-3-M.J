<!doctype html>
<html lang="en">

<head>
    <title>SIAKAD SMAN3</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/linearicons/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/vendor/DataTables/datatables.min.css" />
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/main.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/logo_dikbud.jpg') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/logo_dikbud.jpg') }}">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.html"><img width="30" src="{{asset('images/logo_dikbud.jpg')}}" alt=""></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i
                            class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <span>{{ auth()->user()->user->nama }}</span> <i
                                    class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('logout') }}"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        @if(auth()->user()->akses == 0)
                        <li>
                            <a href="{{ url('admin/beranda') }}"
                                class=" {{ request()->is('admin/beranda') ? 'active' : '' }}"><i
                                    class="lnr lnr-home"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/siswa') }}"
                                class=" {{ request()->is('admin/siswa*') ? 'active' : '' }}"><i
                                    class="lnr lnr-user"></i>
                                <span>Siswa</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/guru') }}"
                                class=" {{ request()->is('admin/guru*') ? 'active' : '' }}"><i class="lnr lnr-user"></i>
                                <span>Guru</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/tahunajaran') }}"
                                class=" {{ request()->is('admin/tahunajaran*') ? 'active' : '' }}"><i
                                    class="lnr lnr-book"></i>
                                <span>Tahun Ajaran</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/kelas') }}"
                                class=" {{ request()->is('admin/kelas*') ? 'active' : '' }}"><i
                                    class="lnr lnr-book"></i>
                                <span>Kelas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/mapel') }}"
                                class=" {{ request()->is('admin/mapel*') ? 'active' : '' }}"><i
                                    class="lnr lnr-book"></i>
                                <span>Mapel</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/jadwal') }}"
                                class=" {{ request()->is('admin/jadwal*') ? 'active' : '' }}"><i
                                    class="lnr lnr-book"></i>
                                <span>Jadwal</span>
                            </a>
                        </li>
                        @elseif(auth()->user()->akses == 1)
                        <li>
                            <a href="{{ url('guru/beranda') }}"
                                class=" {{ request()->is('guru/beranda') ? 'active' : '' }}"><i
                                    class="lnr lnr-home"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('guru/tugas') }}"
                                class=" {{ request()->is('guru/tugas*') ? 'active' : '' }}"><i class="lnr lnr-book"></i>
                                <span>Tugas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('guru/kelas') }}"
                                class=" {{ request()->is('guru/kelas*') ? 'active' : '' }}"><i class="lnr lnr-book"></i>
                                <span>Kelas</span>
                            </a>
                        </li>
                        @elseif(auth()->user()->akses == 2)
                        <li>
                            <a href="{{ url('siswa/beranda') }}"
                                class=" {{ request()->is('siswa/beranda') ? 'active' : '' }}"><i
                                    class="lnr lnr-home"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('siswa/nilai') }}"
                                class=" {{ request()->is('siswa/nilai*') ? 'active' : '' }}"><i
                                    class="lnr lnr-book"></i>
                                <span>Nilai</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('siswa/jadwal')}}"
                                class="{{ request()->is('siswa/jadwal*') ?'active' : '' }}"><i class="lnr lnr-book"></i>
                                <span>Jadwal</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN CONTENT -->
        <div class="main">

            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    @if(session()->has('pesan'))
                    <div class="alert alert-{{session()->get('type')}} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{ session()->get('pesan') }}
                    </div>
                    @endif
                    @yield('content')

                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>

        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I
                        Need</a>.
                    All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="{{ asset('') }}assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('') }}assets/scripts/klorofil-common.js"></script>
    <script src="{{ asset('') }}assets/vendor/DataTables/datatables.min.js"></script>

    @yield('script')
</body>

</html>