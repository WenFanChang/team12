@extends('app')

@section('title', '流行樂團網站 - 列出所有團員')

@section('band_contents')
    <title>列出所有團員</title>
</head>
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
                <from action = "{{url(/orchestra/delet',[id => $orchestra->id}}" method="post">
                    <input class="btn btn-default" type="submit"vaule="刪除"/>
                    @method('delete')
                    @csrf


            </td>
        </tr>
    @endforeach

</table>


    @endsection