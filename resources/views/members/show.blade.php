@extends('app')

@section('title', '顯示特定球員')

@section('band_theme', '你所選取的球員資料')

@section('band_contents')
樂團編號:{{ $member->id }}<br/>
團員姓名:{{ $member->name }}<br/>
樂團編號:{{ $member->oid }}<br/>
樂團位置:{{ $member->position }}<br/>
團員身高:{{ $member->height }}<br/>
團員體重:{{ $member->weight }}<br/>
團員年資:{{ $member->year }}<br/>
團員年齡:{{ $member->age }}<br/>
團員國籍:{{ $member->nationality }}<br/>
@endsection