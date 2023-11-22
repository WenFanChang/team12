<html>
    <head>
        <title> 列出所有團員 </title>

    </head>
    <body>
    
    <h1>列出所有團員 </h1>

    @for($i=0; $i<count($orchestras); $i++)
      {{$orchestra[$i]['name'] }} <br/>
      {{$orchestra[$i]['company'] }} <br/>
      {{$orchestra[$i]['city'] }} <br/>
      {{$orchestra[$i]['style'] }} <br/><br/>
    @endfor
</body>

</html>
