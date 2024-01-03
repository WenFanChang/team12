@extends('app')

@section('title', '流行樂團網站 - 列出所有樂團')

@section('band_contents')
<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
    <a href="{{ route('members.create') }} ">新增樂團</a>
    <a href="{{ route('members.index') }} ">所有樂團</a>
</div>

<table>
    <tr>
        <th>編號</th>
        <th>樂團編號</th>
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
            <td>
                <form action="{{ url('/orchestras/delete', ['id' => $orchestra->id]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="刪除" />
                    @method('delete')
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $orchestras->links() }}
@endsection