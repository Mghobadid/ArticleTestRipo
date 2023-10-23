<div class="crypto-details">
    <div><strong>ID:</strong> {{ $cryptocurrencies->id }}</div>
    <div><strong>Category:</strong> {{ $cryptocurrencies->category }}</div>
    <div><strong>Contract Address:</strong> {{ print_r($cryptocurrencies->contract_address) }}</div>
    <div><strong>Date Added:</strong> {{ $cryptocurrencies->date_added }}</div>
    <div><strong>Date Launched:</strong> {{ $cryptocurrencies->date_launched }}</div>
    <div><strong>Description:</strong> {{ $cryptocurrencies->description }}</div>
    <div><strong>Infinite Supply:</strong> {{ $cryptocurrencies->infinite_supply }}</div>
    <div><strong>Is Hidden:</strong> {{ $cryptocurrencies->is_hidden }}</div>
    <div><strong>Logo:</strong> <img width="25" src="{{ $cryptocurrencies->logo }}" alt=""> {{ $cryptocurrencies->logo }}</div>
    <div><strong>Name:</strong> {{ $cryptocurrencies->name }}</div>
    <div><strong>Notice:</strong> {{ $cryptocurrencies->notice }}</div>
    <div><strong>Platform:</strong> {{ json_encode($cryptocurrencies->platform) }}</div>
    <div><strong>Self Reported Circulating Supply:</strong> {{ $cryptocurrencies->self_reported_circulating_supply }}</div>
    <div><strong>Self Reported Market Cap:</strong> {{ $cryptocurrencies->self_reported_market_cap }}</div>
    <div><strong>Self Reported Tags:</strong> {{ $cryptocurrencies->self_reported_tags }}</div>
    <div><strong>Slug:</strong> {{ $cryptocurrencies->slug }}</div>
    <div><strong>Subreddit:</strong> {{ $cryptocurrencies->subreddit }}</div>
    <div><strong>Symbol:</strong> {{ $cryptocurrencies->symbol }}</div>
    <div><strong>Tag Groups:</strong> {{ json_encode($cryptocurrencies->tag_groups) }}</div>
    <div><strong>Tag Names:</strong> {{ json_encode($cryptocurrencies->tag_names) }}</div>
    <div><strong>Tags:</strong> {{ json_encode($cryptocurrencies->tags) }}</div>
    <div><strong>Twitter Username:</strong> {{ $cryptocurrencies->twitter_username }}</div>
    <div><strong>Updated At:</strong> {{ $cryptocurrencies->updated_at }}</div>
    <div><strong>URLs:</strong> {{ json_encode($cryptocurrencies->urls) }}</div>
</div>





