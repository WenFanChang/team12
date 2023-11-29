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



    
    @for(i= 0;$i<count($orchestras); $i++)
        <tr>
            <td> {{ $orchestras[$i]['id'] }}</td>
            <td> {{ $orchestras[$i]['name'] }}</td>
            <td> {{ $orchestras[$i]['company'] }}</td>
            <td>{{ $orchestras[$i]['city'] }}</td>
            <td> {{ $orchestras[$i]['style'] }}</td>
            <td><a herf="{{ route('orchestras.show', ['id'=>$orchestras[$i]['id']]) }}">顯示</a></td>
            <td><a herf="{{ route('orchestras.edit', ['id'=>$orchestras[$i]['id']]) }}">修改</a></td>
            <td>刪除</td>
        </tr>
    @endfor

</table>


    @endsection