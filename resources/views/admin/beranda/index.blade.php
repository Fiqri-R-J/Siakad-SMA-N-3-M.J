@extends('layouts.app')

@section('content')
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Beranda</h3>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <p>
                        <span class="number"><b>{{ \App\Guru::count() }}</b></span>
                        <span class="title">Guru</span>
                    </p>
                    <div class="text-right">
                        <br>
                        <a class="btn btn-primary btn-block" href="{{ url('admin/guru') }}" role="button">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <p>
                        <span class="number"><b>{{ \App\Siswa::count() }}</b></span>
                        <span class="title">Siswa</span>
                    </p>
                    <div class="text-right">
                        <br>
                        <a class="btn btn-primary btn-block" href="{{ url('admin/siswa') }}" role="button">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-book"></i></span>
                    <p>
                        <span class="number"><b>{{ \App\Kelas::count() }}</b></span>
                        <span class="title">Kelas</span>
                    </p>
                    <div class="text-right">
                        <br>
                        <a class="btn btn-primary btn-block" href="{{ url('admin/kelas') }}" role="button">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-book"></i></span>
                    <p>
                        <span class="number"><b>{{ \App\Mapel::count() }}</b></span>
                        <span class="title">Mapel</span>
                    </p>
                    <div class="text-right">
                        <br>
                        <a class="btn btn-primary btn-block" href="{{ url('admin/mapel') }}" role="button">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection