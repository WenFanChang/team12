@extends('app')


@section('title',  '建立團員表單')

@section('team12',  '建立團員表單')
@section('team12_contents')
    {!! Form::open(['url' =>'players/store'])!!}
    @include('members.form',['submitButtonText'=>"新增團員資料"])
    {!! Form::close() !!}
@endsection











