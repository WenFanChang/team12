@extends('app')

@section('title','顯示特定團員')

@section('band_them','你所選取的團員資料')

@section('band_contents')
<h1>列出所有團員</h1>
團員編號:{{ $member->id }}<br/>
人員名稱:{{ $member->name }}<br/>
團體名稱:{{ $member->oid }}<br/>
團員位置:{{ $member->position }}<br/>
團員身高:{{ $member->height }}<br/>
團員體重:{{ $member->weight }}<br/>
團員年資:{{ $member->year }}<br/>
團員年齡:{{ $member->age }}<br/>
團員國籍:{{ $member->nationality }}<br/>

<h1>{{ $member->name }}的所有球員</h1>

@endsection