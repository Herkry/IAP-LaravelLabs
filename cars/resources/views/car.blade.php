<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($cars as $car)
        <li>{{$car->make}}<br>{{$car->model}}<br>{{$car->produced_on}}</li>
        
        
    @endforeach
    
</body>
</html>