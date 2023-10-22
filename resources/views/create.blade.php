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
    <label for="title"> English:</label>
    <input id="title" name="title"></input>
{{--    <br>--}}
{{--    <label for="title[es]">spasian :</label>--}}
{{--    <input id="title[es]" name="title[es]"></input>--}}
{{--    <br>--}}
{{--    <label for="title[tr]">Turkey :</label>--}}
{{--    <input id="title[tr]" name="title[tr]"></input>--}}
{{--    <br>--}}
    <label for="body">Content English:</label>
    <textarea id="body" name="body"></textarea> <br>
{{--    <label for="content[es]">Content Espain:</label>--}}
{{--    <textarea id="content[es]" name="content[es]"></textarea> <br>--}}
{{--    <label for="content[tr]">Content Turkey:</label>--}}
{{--    <textarea id="content[tr]" name="content[tr]"></textarea> <br>--}}
    <br>
    Translates:
   es <input type="checkbox" name="translates[es]" value="es" >
   tr <input type="checkbox" name="translates[tr]" value="tr" >

    <input type="submit" value="Submit">
</form>
</body>
</html>
