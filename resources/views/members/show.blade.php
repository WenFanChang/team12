
@extends('app')

@section('title','顯示特定團員')

@section('band_them','你所選取的團員資料')

@section('band_contents')
團員編號:{{ $player->id }}<br/>
人員名稱:{{ $player->name }}<br/>
團體名稱:{{ $player->orchestra->name }}<br/>
團員位置:{{ $player->position }}<br/>
團員身高:{{ $player->height }}<br/>
團員體重:{{ $player->weight }}<br/>
團員年資:{{ $player->year }}<br/>
團員年齡:{{ $player->age }}<br/>
團員國籍:{{ $player->nationality }}<br/>
@endsection