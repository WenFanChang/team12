@extends('app')

@section('title', '顯示特定團員')

@section('band_theme','您所選取的團員資料')
@section('band_contents')

團員姓名{{$orchestras->name }}<br/>
團隊編號{{$orchestras->company }}<br/>
團隊位置{{$orchestras->city }}<br/>
團員身高{{$orchestras->style }}<br/>

<h1>列出所有團員</h1>

<table>
    <tr>
        <th>編號</th>
        <th>姓名</th>
        <th>團隊編號</th>
        <th>位置</th>
        <th>身高</th>
        <th>體重</th>
        <th>年資</th>
        <th>年齡</th>
        <th>國籍</th>
       
    </tr>
    @foreach ($members as $member)
        <tr>
            <td>{{ $member->id}}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->orchestra->name }}</td>
            <td>{{ $member->position }}</td>
            <td>{{ $member->weight }}</td>
            <td>{{ $member->height }}</td>
            <td>{{ $member->year}}</td>
            <td>{{ $member->age}}</td>
            <td>{{ $member->nationality }}</td>
            
        </tr>
    @endforeach
</table>

@endsection
