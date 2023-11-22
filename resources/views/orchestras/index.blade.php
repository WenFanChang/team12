<html>

<head>
    <title>列出所有團員</title>
<head>

<body>
<h1>列出所有團員</h1>

@for($i=0; $i<count($orchestras); $i++)
    {{ $orchestras[$i]['name'] }} <br/>
    {{ $orchestras[$i]['company'] }} <br/>
    {{ $orchestras[$i]['city'] }} <br/>
    {{ $orchestras[$i]['style'] }} <br/><br/>
@endfor

</body>
</html>