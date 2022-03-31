@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="panel panel-headline">
            <div class="panel-body">
                <br>
                <div class="profile-header">
                    <div class="overlay"></div>
                    <div class="profile-main">
                        @if($user->profil)
                        <img src="{{ \Storage::url($user->profil) }}" class="img-circle" alt="Avatar" width="50">
                        @else
                        <img src="{{ asset('images/user.png') }}" class="img-circle" alt="Avatar" width="50">
                        @endif
                        <h3 class="name">{{ $user->nama }}</h3>
                    </div>
                </div>
                <div class="profile-detail">
                    <div class="profile-info">
                        <h4 class="heading">Informasi Profil</h4>
                        <ul class="list-unstyled list-justify">
                            <li>Nama <span>{{ $user->nama }}</span></li>
                            <li>NISN <span>{{ $user->nisn }}</span></li>
                            <li>Email <span>{{ $user->user->email }}</span></li>
                            <li>Jenis Kelamin <span>{{ $user->jenkel }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-headline">
            <div class="panel-body">
                @if(empty($kelas))
                <h3 align="center">Belum Memiliki Kelas</h3>
                @else
                <h3>Kelas</h3>
                <table>
                    <tbody>
                        <tr>
                            <td>Kelas</td>
                            <td>&emsp;: {{ $kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                            <td>&emsp;: {{ $kelas->guru->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>&emsp;: {{ $kelas->tahunajaran->tahun }}</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>&emsp;: {{ $kelas->tahunajaran->semester }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="panel panel-headline" style="border: 1px solid lightgray">
                    <div class="panel-body">
                        <h3>Jadwal Hari Ini ({{$hari}})</h3>
                        <hr>
                        <table class="table table-striped table-bordered" id="tabel-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Mapel</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwal_sekarang as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td>{{ $item->mapel->nama_pelajaran }}</td>
                                    <td>{{ $item->hari }}</td>
                                    <td>{{ $item->jam }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel panel-headline" style="border: 1px solid lightgray">
                    <div class="panel-body">
                        <div class="custom-tabs-line tabs-line-bottom left-aligned">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Tugas Minggu
                                        Ini</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-bottom-left1">
                                <ul class="list-unstyled activity-timeline">
                                    @foreach ($tugas_mingguan as $item)
                                    @php
                                    $created_at = $item->created_at;
                                    $minggu = $created_at->addDay(7);
                                    $hari_ini = \Carbon\Carbon::now();
                                    @endphp
                                    @if($minggu > $hari_ini)
                                    <li>
                                        <i class="fa fa-comment activity-icon"></i>
                                        <p>{{ $item->tugas }} | {{ $item->mapel->nama_pelajaran }} <span
                                                class="timestamp">{{ $item->created_at->format('d M Y | H:i') }}</span>
                                        </p>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#tabel-1').DataTable();
        $('#tabel-2').DataTable();
    });
</script>
@endsection