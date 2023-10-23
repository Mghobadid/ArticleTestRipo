<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            padding: 2rem;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Symbol</th>
        <th>Slug</th>
        <th>CMC Rank</th>
        <th>Market Cap</th>
        <th>Price</th>
        <th>Price (IR)</th>
        <th>Volume (24h)</th>
        <th>Percent Change (1h)</th>
        <th>Percent Change (24h)</th>
        <th>Percent Change (7d)</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($values as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{route('crypto.show',['cryptocurrencies'=>$item->id])}}">{{ $item->name }}</a></td>
            <td>{{ $item->symbol }}</td>
            <td>{{ $item->slug }}</td>
            <td>{{ $item->cmc_rank }}</td>
            <td>{{ $item->market_cap }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->price_ir }}</td>
            <td>{{ $item->volume_24h }}</td>
            <td>{{ $item->percent_change_1h }}</td>
            <td>{{ $item->percent_change_24h }}</td>
            <td>{{ $item->percent_change_7d }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$values->links()}}
</body>
</html>
