@extends('app')

@section('title', '顯示特定球員')

@section('band_theme', '你所選取的球員資料')

@section('band_contents')
樂團編號:{{ $orchestra->id }}<br/>
樂團名稱:{{ $orchestra->name }}<br/>
公司名稱:{{ $orchestra->company }}<br/>
公司位置:{{ $orchestra->city }}<br/>
曲風類別:{{ $orchestra->style }}<br/>
@endsection