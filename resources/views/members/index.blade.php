<html>
<head>
    <title>列出所有團員<title>
</head>


<body>
<h1>列出所有團員</h1>
@for(i=0; $i<count($players);$i++)
    {[ $members[i]['name'] ]}<br/>
    
    {[ $members[i]['position'] ]}<br/>
    {[ $members[i]['weight'] ]}<br/>
    {[ $members[i]['height'] ]}<br/>
    {[ $members[i]['year'] ]}<br/>
    {[ $members[i]['age'] ]}<br/>
    {[ $members[i]['nationality'] ]}<br/><br/>

@endfor




</body>
</html>











