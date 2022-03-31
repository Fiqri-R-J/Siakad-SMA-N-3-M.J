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
                        <h4 class="heading">Basic Info</h4>
                        <ul class="list-unstyled list-justify">
                            <li>Nama <span>{{ $user->nama }}</span></li>
                            <li>NIP <span>{{ $user->nip }}</span></li>
                            <li>Email <span>{{ $user->user->email }}</span></li>
                            <li>Telepon <span>{{ $user->no_tlpn }}</span></li>
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
                <h3>Jadwal Pelajaran {{ $tahunajaran->semester }} {{ $tahunajaran->tahun }}</h3>
                <hr>
                <table class="table table-striped table-bordered" id="tabel-1">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Mapel</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal as $item)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td>{{ $item->mapel->nama_pelajaran }}</td>
                            <td>{{ $item->kelas->nama_kelas }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>{{ $item->jam }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#tabel-1').DataTable();
    });
</script>
@endsection