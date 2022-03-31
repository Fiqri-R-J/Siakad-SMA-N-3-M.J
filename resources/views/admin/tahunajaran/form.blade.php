@extends('layouts.app')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Tambah Tahun Ajaran</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
        <div class="form-group">
            {{ Form::label('tahun', 'TAHUN') }}
            {{ Form::text('tahun',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('tahun') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('semester', 'SEMESTER') }} <br>
            {{ Form::select('semester', ['Genap' => 'Genap', 'Ganjil' => 'Ganjil'],null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('jenkel') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection