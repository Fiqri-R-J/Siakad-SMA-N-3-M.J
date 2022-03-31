@extends('layouts.app')
@section('content')

<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Detail Kelas</h3>
        <hr>
        <table>
            <tbody>
                <tr>
                    <td>Kelas</td>
                    <td>&emsp;: {{ $kelas->nama_kelas }}</td>
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
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>GURU</th>
                    <th>MATA PELAJARAN</th>
                    <th>SUDAH DINILAI</th>
                    <th>BELUM DINILAI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapel as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \App\Jadwal::where('kelas_id', $id)->where('mapel_id', $item->id)->first()->guru->nama}}
                    </td>
                    <td>{{ $item->nama_pelajaran }}</td>
                    <td>
                        {{ \App\Nilai::where('kelas_id', $id)->where('mapel_id', $item->id)->count() }}
                    </td>
                    <td>
                        {{ \App\KelasSiswa::where('kelas_id', $id)->count() - \App\Nilai::where('kelas_id', $id)->where('mapel_id', $item->id)->count() > 0 ? \App\KelasSiswa::where('kelas_id', $id)->count() - \App\Nilai::where('kelas_id', $id)->where('mapel_id', $item->id)->count() : '0' }}
                    </td>
                    <td><a name="" id="" class="btn btn-primary btn-sm"
                            href="{{ url('guru/kelas/' . $id . '/nilai/' . $item->id) }}" role="button">Detail Nilai</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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