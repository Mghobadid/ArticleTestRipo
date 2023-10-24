<div class="crypto-details">
    <div><strong>ID:</strong> {{ $coinInfo->id }}</div>
    <div><strong>Category:</strong> {{ $coinInfo->category }}</div>
    <div><strong>Contract Address:</strong> {{ print_r($coinInfo->contract_address) }}</div>
    <div><strong>Date Added:</strong> {{ $coinInfo->date_added }}</div>
    <div><strong>Date Launched:</strong> {{ $coinInfo->date_launched }}</div>
    <div><strong>Description:</strong> {{ $coinInfo->description }}</div>
    <div><strong>Infinite Supply:</strong> {{ $coinInfo->infinite_supply }}</div>
    <div><strong>Is Hidden:</strong> {{ $coinInfo->is_hidden }}</div>
    <div><strong>Logo:</strong> <img width="25" src="{{ $coinInfo->logo }}" alt=""> {{ $coinInfo->logo }}</div>
    <div><strong>Name:</strong> {{ $coinInfo->name }}</div>
    <div><strong>Notice:</strong> {{ $coinInfo->notice }}</div>
    <div><strong>Platform:</strong> {{ json_encode($coinInfo->platform) }}</div>
    <div><strong>Self Reported Circulating Supply:</strong> {{ $coinInfo->self_reported_circulating_supply }}</div>
    <div><strong>Self Reported Market Cap:</strong> {{ $coinInfo->self_reported_market_cap }}</div>
    <div><strong>Self Reported Tags:</strong> {{ $coinInfo->self_reported_tags }}</div>
    <div><strong>Slug:</strong> {{ $coinInfo->slug }}</div>
    <div><strong>Subreddit:</strong> {{ $coinInfo->subreddit }}</div>
    <div><strong>Symbol:</strong> {{ $coinInfo->symbol }}</div>
    <div><strong>Tag Groups:</strong> {{ json_encode($coinInfo->tag_groups) }}</div>
    <div><strong>Tag Names:</strong> {{ json_encode($coinInfo->tag_names) }}</div>
    <div><strong>Tags:</strong> {{ json_encode($coinInfo->tags) }}</div>
    <div><strong>Twitter Username:</strong> {{ $coinInfo->twitter_username }}</div>
    <div><strong>Updated At:</strong> {{ $coinInfo->updated_at }}</div>
    <div><strong>URLs:</strong> {{ json_encode($coinInfo->urls) }}</div>
    <fieldset>
        <h1>Detail</h1>

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
            <tr>
                <td>{{ $coinInfo->Cryptocurrency->id }}</td>
                <td> {{ $coinInfo->Cryptocurrency->name }}</td>
                <td>{{ $coinInfo->Cryptocurrency->symbol }}</td>
                <td>{{ $coinInfo->Cryptocurrency->slug }}</td>
                <td>{{ $coinInfo->Cryptocurrency->cmc_rank }}</td>
                <td>{{ $coinInfo->Cryptocurrency->market_cap }}</td>
                <td>{{ $coinInfo->Cryptocurrency->price }}</td>
                <td>{{ $coinInfo->Cryptocurrency->price_ir }}</td>
                <td>{{ $coinInfo->Cryptocurrency->volume_24h }}</td>
                <td>{{ $coinInfo->Cryptocurrency->percent_change_1h }}</td>
                <td>{{ $coinInfo->Cryptocurrency->percent_change_24h }}</td>
                <td>{{ $coinInfo->Cryptocurrency->percent_change_7d }}</td>
                <td>{{ $coinInfo->Cryptocurrency->created_at }}</td>
                <td>{{ $coinInfo->Cryptocurrency->updated_at }}</td>
            </tr>
            </tbody>
        </table>
    </fieldset>
</div>





