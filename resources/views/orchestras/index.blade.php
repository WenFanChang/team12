
@extends('app')

@section('title', '樂團網站 - 列出所有樂團')

@section('band_contents')
<h1> 列出所有樂團 </h1>

<table>
    <tr>
        <th>編號</th>   
        <th>團體名稱</th>
        <th>公司名稱</th>
        <th>公司位置</th>
        <th>曲風類別</th>
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    @for($i=0; $i<count($orchestras); $i++)
    <tr>
        <td> {{ $orchestras[$i]['id'] }}</td>
        <td> {{ $orchestras[$i]['name'] }}</td> 
        <td> {{ $orchestras[$i]['company'] }} </td>
        <td> {{ $orchestras[$i]['city'] }} </td>
        <td> {{ $orchestras[$i]['style'] }} </td>
        <td><a href="{{ route('orchestras.show', ['id'=>$orchestras[$i]['id']]) }}">顯示</td>
        <td><a href="{{ route('orchestras.edit', ['id'=>$orchestras[$i]['id']]) }}">修改</td>
        <td>刪除</td>

    </tr>

        
    @endfor
</table>

@endsection
