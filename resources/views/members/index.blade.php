
<html>
    <head> 
        <title> 列出所有團員 </title>
    </head>
    <body>
    <h1> 列出所有團員 </h1>

    <table>
        <tr>
            <th>編號</th>
            <th>人員名稱</th>
            <th>團體</th>
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
        @for($i=0; $i<count($members); $i++)
            <tr>
                <td>{{ $members[$i]['id'] }}</td>
                <td>{{ $members[$i]['name'] }}</td>
                <td>{{ $members[$i]['oid'] }}</td>
                <td>{{ $members[$i]['position'] }}</td>
                <td>{{ $members[$i]['height'] }}</td>
                <td>{{ $members[$i]['weight'] }}</td>
                <td>{{ $members[$i]['year'] }}</td>
                <td>{{ $members[$i]['age'] }}</td>
                <td>{{ $members[$i]['nationality'] }}</td>
            </tr>
            
        @endfor
    </table>


    </body>
    
</html>