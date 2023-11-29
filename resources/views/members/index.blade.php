@extends('app')

@section('title', '流行樂團網站 - 列出所有團員')

@section('band_contents')
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
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    @for($i= 0; $i<count($members); $i++)
        <tr>
            <td>{{ $members[$i]['id'] }}</td>
            <td>{{ $members[$i]['name'] }}</td>
            <td>{{ $members[$i]['oid'] }}</td>
            <td>{{ $members[$i]['position'] }}</td>
            <td>{{ $members[$i]['weight'] }}</td>
            <td>{{ $members[$i]['height'] }}</td>
            <td>{{ $members[$i]['year'] }}</td>
            <td>{{ $members[$i]['age'] }}</td>
            <td>{{ $members[$i]['nationality'] }}</td>
            <td><a herf="{{ route('members.show', ['id'=>$members[$i]['id']]) }}">顯示</a></td>
            <td><a herf="{{ route('members.edit', ['id'=>$members[$i]['id']]) }}">修改</a></td>
            <td>刪除</td>
        </tr>
    @endfor
</table>


@endsection










