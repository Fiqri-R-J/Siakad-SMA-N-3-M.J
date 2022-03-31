@extends('layouts.app')
@section('content')

<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Kelas</h3>
        <hr>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>KELAS</th>
                    <th>WALI KELAS</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $item)
                @if($item->guru->id == auth()->user()->user->id)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kelas }}</td>
                    <td>{{ $item->guru->nama }}</td>
                    <td><span class="label label-primary">Wali Kelas</span>
                    </td>
                    <td>
                        @if($item->guru->id == auth()->user()->user->id)
                        <a name="" id="" class="btn btn-primary btn-sm" href="{{ url('guru/kelas/'.$item->id) }}"
                            role="button">Detail Kelas</a>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Mata Pelajaran</h3>
        <hr>
        @foreach($kelas as $item)
        <div class="panel panel-headline" style="border: 1px solid lightgray">
            <div class="panel-body">
                <h3>{{ $item->nama_kelas }}</h3>
                <table class="table table-striped table-bordered" id="tabel-1">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>MATA PELAJARAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->jadwal->unique('mapel_id') as $item2)
                        <tr>
                            <td width="75px">{{ $loop->iteration }}</td>
                            <td>{{ $item2->mapel->nama_pelajaran }}</td>
                            <td width="150px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ url('guru/kelas/'. $item->id .'/mapel/' . $item2->mapel_id) }}"
                                    role="button">Nilai Siswa : {{ $item->siswa->count() }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
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