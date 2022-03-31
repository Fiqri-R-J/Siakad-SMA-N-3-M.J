@extends('layouts.app')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Tambah Siswa</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
        <div class="form-group">
            {{ Form::label('nisn', 'NISN') }}
            {{ Form::text('nisn',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('nisn') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('nama', 'NAMA SISWA') }}
            {{ Form::text('nama',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('alamat', 'ALAMAT') }}
            {{ Form::text('alamat',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('alamat') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('tpt_lahir', 'TEMPAT LAHIR') }}
            {{ Form::text('tpt_lahir',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('tpt_lahir') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('tgl_lahir', 'TANGGAL LAHIR') }}
            {{ Form::date('tgl_lahir',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('jenkel', 'JENIS KELAMIN') }} <br>
            {{ Form::select('jenkel', ['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'], null,
                        ['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('jenkel') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('profil', 'FOTO PROFIL') }}
            {{ Form::file('profil',['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('profil') }}</span>
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('email', 'ALAMAT EMAIL') }}
            {{ Form::email('email',null,['class' => 'form-control']) }}
            @if($model->toArray())
            <small class="form-text text-muted">Abaikan Jika Tidak Ingin Diubah</small>
            <br>
            @endif
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'PASSWORD') }}
            {{ Form::password('password',['class' => 'form-control']) }}
            @if($model->toArray())
            <small class="form-text text-muted">Abaikan Jika Tidak Ingin Diubah</small>
            <br>
            @endif
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection