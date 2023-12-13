@extends('app')

@section('title','顯示特定團員')

@section('band_them','你所選取的團員資料')

@section('band_contents')
<h1>列出所有團體</h1>
編號:{{ $orchestra->id }}<br/>
團體名稱:{{ $orchestra->name }}<br/>
公司名稱:{{ $orchestra->company }}<br/>
公司位置:{{ $orchestra->city }}<br/>
曲風類別:{{ $orchestra->style }}<br/>
@endsection