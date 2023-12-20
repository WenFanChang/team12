@extends('app')

@section('title', '流行樂團網站 - 列出所有團員')

@section('band_contents')
<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-1">
    <a href = "{{ route('members.create') }} ">新增團員</a>
    <a href = "{{ route('members.index') }} ">所有團員</a>
</div>

<table>
    <tr>
        <td>團體名稱</td>
        <td>公司名稱</td>
        <td>公司位置</td>
        <td>曲風類別</td>
        <td>操作1</td>
        <td>操作2</td>
        <td>操作3</td>
    </tr>



    
    @foreach ($orchestras as $orchestra)
        <tr>
            <td> {{ $orchestra->id }}</td>
            <td> {{ $orchestra->name }}</td>
            <td> {{ $orchestra->company }}</td>
            <td>{{ $orchestra->city }}</td>
            <td> {{ $orchestra->style }}</td>
            <td><a href="{{ route('orchestras.show', ['id'=>$orchestra->id]) }}">顯示</a></td>
            <td><a href="{{ route('orchestras.edit', ['id'=>$orchestra->id]) }}">修改</a></td>
            <td>
                <form action = "{{ url('/orchestras/delete', ['id' => $orchestra->id]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="刪除"/>
                    @method('delete')
                    @csrf
                </form>

            </td>
        </tr>
    @endforeach

</table>


    @endsection