@extends('app')

@section('title', '流行樂團網站 - 列出所有團員')

@section('band_contents')
<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-1">
    <a href = "{{ route('members.create') }} ">新增團員</a>
    <a href = "{{ route('members.index') }} ">所有團員</a>
</div>
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
    @foreach ($members as $member)
        <tr>
            <td>{{ $member->id}}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->oid}}</td>
            <td>{{ $member->position }}</td>
            <td>{{ $member->height }}</td>
            <td>{{ $member->weight }}</td>
            <td>{{ $member->year}}</td>
            <td>{{ $member->age}}</td>
            <td>{{ $member->nationality }}</td>
            <td><a href="{{ route('members.show', ['id'=>$member->id]) }}">顯示</a></td>
            <td><a href="{{ route('members.edit', ['id'=>$member->id]) }}">修改</a></td>
            <td>
                <form action ="{{ url('/members/delete',['id' => $member->id]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="刪除"/>
                    @method('delete')
                    @csrf
                </form> 

            </td>
        </tr>
    @endforeach
</table>


@endsection










