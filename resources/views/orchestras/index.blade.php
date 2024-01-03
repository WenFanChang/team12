
@extends('app')

@section('title', '樂團網站 - 列出所有樂團')

@section('band_contents')
<h1> 列出所有樂團 </h1>
<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-1">
    @can('admin')
    <a href="{{ route('orchestras.create') }}">新增樂團</a>
    @endcan
    <a href="{{ route('orchestras.index') }} ">所有樂團</a>

</div>

<table>
    <tr>
        <th>編號</th>   
        <th>團體名稱</th>
        <th>公司名稱</th>
        <th>公司位置</th>
        <th>曲風類別</th>
        <th>操作1</th>
        @can('admin')
        <th>操作2</th>
        <th>操作3</th>
        @elsecan('manager')
        <th>操作2</th>
        @endcan
    </tr>
    @foreach ($orchestras as $orchestra)
    <tr>
        <td> {{ $orchestra->id }}</td>
        <td> {{ $orchestra->name }}</td> 
        <td> {{ $orchestra->company }} </td>
        <td> {{ $orchestra->city }} </td>
        <td> {{ $orchestra->style }} </td>
        <td><a href="{{ route('orchestras.show', ['id'=>$orchestra->id]) }}">顯示</a></td>
        @can('admin')
        <td><a href="{{ route('orchestras.edit', ['id'=>$orchestra->id]) }}">修改</a></td>
        <td>
            <form action="{{ url('/orchestras/delete', ['id' => $orchestra->id]) }}" method="post">
                <input class="btn btn-default" type="submit" value="刪除" />
                @method('delete')
                @csrf
            </form>
        </td>
        @elsecan('manager')
            <td><a href="{{ route('orchestras.edit', ['id'=>$orchestra->id]) }}">修改</a></td>    
            @endcan

    </tr>

        
    @endforeach
</table>
{{ $orchestras->links() }}
@endsection
