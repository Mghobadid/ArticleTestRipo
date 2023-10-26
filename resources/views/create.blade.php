<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('home.store')}}" method="post">
    @csrf
    <label for="title"> Title:</label>
    <input id="title" name="title"></input>
    <label for="body">Body:</label>
    <textarea id="body" name="body"></textarea> <br>

    <br>

    <input type="submit" value="Submit">
</form>
<form action="{{route('home.update',['article'=>1])}}" method="post">
    @csrf
    <label for="title"> Title:</label>
    <input id="title" name="title"></input>
    <label for="body">Body:</label>
    <textarea id="body" name="body"></textarea> <br>

    <br>

    <input type="submit" value="Submit">
</form>
</body>
</html>
