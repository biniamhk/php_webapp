<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>This is home page blade</h1>
   <p>the greate number is{{4+4}}</p> 
   <p>the current date is {{date('y m d')}}</p>
   <h1>{{$name}}</h1>
   <h3>{{$catname}}</h3>
   <ol>
    @foreach($animals as $animal)
    <li>{{$animal}}</li>        
    @endforeach
   </ol>
   <a href="/about">Go to about page.</a>
</body>
</html>