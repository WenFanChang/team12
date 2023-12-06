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
    @foreach ($orchestras as $ orchestra)
        <tr>
            <td>{{ $orchestras->id }} </td>
            <td>{{ $orchestras->name }} </td>
            <td>{{ $orchestras->company }} </td>
            <td>{{ $orchestras->city }} </td>
            <td>{{ $orchestras->style }} </td>
            <td><a href="{{ route('orchestras.show', ['id'=>$orchestras->id]) }}">顯示</a></td>
            <td><a href="{{ route('orchestras.edit', ['id'=>$orchestras->id]) }}">修改</a></td>
            <td>刪除</td>
        </tr>
    @endfor
</table>
@endsection