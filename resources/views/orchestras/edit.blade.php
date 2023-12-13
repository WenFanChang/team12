@extends('app')

@section('title', '編輯特定樂團')

@section('band_theme', '編輯中的樂團')

@section('band_contents')
    {!! Form::model($orchestra, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\OrchestrasController@update', $orchestra->id]]) !!}
    @include('orchestra.form', ['submitButtonText'=>"更新樂團資料"])
    {!! Form::close() !!}
@endsection