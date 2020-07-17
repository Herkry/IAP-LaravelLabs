<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(Session::has("form_submit"))
        <li>{{session("form_submit")}}</li>
    @endif
    
    @if(count($errors))
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif

    <form action="/car" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        Make: <input type="text" name="make" value={{old("make")}} /><br>
        Model: <input type="text" name="model" value={{old("model")}} required><br>
        Produced on: <input type="date" name="produced_on" value={{old("produced_on")}} required><br>
        <input type="file" name="image_url" value={{old("image_url")}} id="">
        <input type="submit" value="Save">
    </form>
    
</body>
</html>