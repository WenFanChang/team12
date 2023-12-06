
@extends('app')

@section('title','顯示特定團員')

@section('band_them','你所選取的團員資料')

@section('band_contents')
編號:{{ $player->id }}<br/>
團體名稱:{{ $player->name }}<br/>
公司名稱:{{ $player->company }}<br/>
公司位置:{{ $player->city }}<br/>
曲風類別:{{ $player->style }}<br/>
@endsection