@extends('app')


@section('title',  '建立團員表單')

@section('band_theme',  '建立團員表單')
@section('band_contents')
    @include('massage.list')
    {!! Form::open(['url' =>'members/store'])!!}
    @include('members.form',['submitButtonText'=>"新增團員資料"])
    {!! Form::close() !!}
@endsection











