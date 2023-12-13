@extends('app')

@section('title','顯示特定團員')

@section('band_theme','你所選取的團員資料')

@section('band_contents')
<h1>列出所有團體</h1>
編號:{{ $orchestra->id }}<br/>
團體名稱:{{ $orchestra->name }}<br/>
公司名稱:{{ $orchestra->company }}<br/>
公司位置:{{ $orchestra->city }}<br/>
曲風類別:{{ $orchestra->style }}<br/>

<h1>{{ $orchestra->name }}的所有團員</h1>

<table>
    <tr>
        <th>編號</th>
        <th>人員名稱</th>
        <th>團體</th>
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
            <td>{{ $member->name}}</td>
            <td>{{ $member->orchestra-name}}</td>
            <td>{{ $member->position}}</td>
            <td>{{ $member->height}}</td>
            <td>{{ $member->weight}}</td>
            <td>{{ $member->year}}</td>
            <td>{{ $member->age}}</td>
            <td>{{ $member->nationality}}</td>
        <tr>
    @endforeach
</table>
@endsection