@extends('app')

@section('title', '編輯特定樂團')

@section('band_theme', '編輯特定的樂團')

@section('band_contents')
    @include('message.list')
    {!! Form::model($orchestra, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\OrchestrasController@update', $orchestra->id]]) !!}
    @include('orchestras.form', ['submitButtonText'=>"更新球員資料"])
    {!! Form::close() !!}
@endsection