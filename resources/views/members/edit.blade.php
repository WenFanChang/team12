@extends('app')

@section('title', '編輯特定團員')

@section('band_theme', '編輯特定團員')

@section('band_contents')
    {!! Form::model($member, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\MembersController@update', $member->id]]) !!}
    @include('members.form', ['submitButtonText'=>"更新團員資料"])
    {!! Form::close() !!}
@endsection