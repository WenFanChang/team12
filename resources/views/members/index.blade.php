@extends('app')

@section('title', '流行樂團網站 - 列出所有團員')

@section('band_contents')
<h1>列出所有團員</h1>
<table>
    <tr>
        <th>編號</th>
        <th>姓名</th>
        <th>所屬團隊</th>
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
    @foreach ($members as $member)
        <tr>
            <td>{{ $member->id }} </td>
            <td>{{ $member->name }} </td>
            <td>{{ $member->orchestra->name }} </td>
            <td>{{ $member->position }} </td>
            <td>{{ $member->height }} </td>
            <td>{{ $member->weight }} </td>
            <td>{{ $member->year }} </td>
            <td>{{ $member->age }} </td>
            <td>{{ $member->nationality }} </td>
            <td><a href="{{ route('members.show', ['id'=>$member->id]) }}">顯示</a></td>
            <td><a href="{{ route('members.edit', ['id'=>$member->id]) }}">修改</a></td>
            <td>
                <form action="{{ url('/members/delete', ['id' => $member->id]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="刪除" />
                    @method('delete')
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection