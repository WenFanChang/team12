@extends('app')

@section('title', '流行樂團網站 - 列出所有樂團')

@section('band_contents')
<h1>列出所有樂團</h1>
<table>
    <tr>
        <th>編號</th>
        <th>團隊編號</th>
        <th>公司名稱</th>
        <th>公司位置</th>
        <th>曲風類別</th>
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    @extends('app')

@section('title', '流行樂團網站 - 列出所有團員')

@section('band_contents')
<h1>列出所有團員</h1>
<table>
    <tr>
        <th>編號</th>
        <th>團隊編號</th>
        <th>公司名稱</th>
        <th>公司位置</th>
        <th>曲風類別</th>
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    @foreach ($orchestras as $orchestra)
        <tr>
            <td>{{ $orchestra->id }} </td>
            <td>{{ $orchestra->name }} </td>
            <td>{{ $orchestra->company }} </td>
            <td>{{ $orchestra->city }} </td>
            <td>{{ $orchestra->style }} </td>
            <td><a href="{{ route('orchestras.show', ['id'=>$orchestra->id]) }}">顯示</a></td>
            <td><a href="{{ route('orchestras.edit', ['id'=>$orchestra->id]) }}">修改</a></td>
            <td>刪除</td>
        </tr>
    @endforeach
</table>
@endsection