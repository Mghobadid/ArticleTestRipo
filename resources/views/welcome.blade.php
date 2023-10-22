<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
<body class="antialiased">
<form action="{{route('home.index')}}" method="get">
    @csrf
    <div>
        <label for="from_date">Start date:</label>
        <input type="date" id="from_date" value="{{request('from_date')??null}}" name="from_date">
    </div>

    <div>
        <label for="to_date">End date:</label>
        <input type="date" id="to_date" value="{{request('to_date')??null}}" name="to_date">
    </div>

    <button type="submit">Submit</button>
</form>
likes_count=>{{$likes_count}} <br>
view_count={{$view_count}}<br>
most_viewed_article={{$most_viewed_article}}<br>
most_liked_article=<a href="{{$most_liked_article->id}}">{{$most_liked_article->title}}</a>({{$most_liked_article->likes_count}} Like)<br>
count_article_types={{$count_article_types}}<br>
</body>
</html>
