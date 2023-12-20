@extends('app')

@section('title', '建立樂團表單')

@section('band_theme', '建立樂團的表單')

@section('band_contents')
    @include('message.list')
    {!! Form::open(['url' => 'orchestras/store']) !!}
    @include('orchestras.form', ['submitButtonText'=>"新增球員資料"])
    {!! Form::close() !!}
@endsection