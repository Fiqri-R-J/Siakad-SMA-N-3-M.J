@extends('layouts.app')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Tambah Mata Pelajaran</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
        <div class="form-group">
            {{ Form::label('nama_pelajaran', 'NAMA MATA PELAJARAN') }}
            {{ Form::text('nama_pelajaran',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('nama_pelajaran') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection