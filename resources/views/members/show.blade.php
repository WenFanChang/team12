@extends('app')

@section('title', '顯示特定團員')

@section('band_theme','您所選取的團員資料')
@section('band_contents')

團員姓名{{$member->name }}<br/>
團隊編號{{$member->oid }}<br/>
團隊位置{{$member->position }}<br/>
團員身高{{$member->height }}<br/>
團員體重{{$member->Weight}}<br/>
團員年資{{$member->year }}<br/>
團員年齡{{$member->age}}<br/>
團員國籍{{$member->inationality }}<br/>
@endsection

