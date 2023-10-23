<?php

namespace App\Jobs;

use App\Models\CoinInfo;
use App\Models\cryptocurrencies;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class UpdateCoinInfoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $crypto_ids;

    public function __construct()
    {
        $this->crypto_ids = cryptocurrencies::pluck('id')->toArray();
    }

    public function handle(): void
    {
        $ids_ = implode(',', $this->crypto_ids);
        $response = Cache::remember('crypto_info', 3600, function () use ($ids_) {
            $headers = [
                // 'X-CMC_PRO_API_KEY' => '0af4288d-7634-49c9-9338-8a7798e06d5c'
                // 'X-CMC_PRO_API_KEY' => '134e7a1d-8a71-4140-94d3-dc142efec103'
                'X-CMC_PRO_API_KEY' => 'bde58904-5d32-4386-ab66-cbf98b060394'
                // 'X-CMC_PRO_API_KEY' => 'ba600f64-130c-431a-9848-71cf3966d0ce'
            ];
            $response = Http::withHeaders($headers)->get("https://pro-api.coinmarketcap.com/v2/cryptocurrency/info?id={$ids_}");
            if ($response->successful())
            {
                return $response->json();
            }
            return [];
        });
        $values = [];
        foreach (array_values($response['data']) as $info)
        {
//            Log::info($info);
//            die;
            $values[] = [
                'id' => $info['id'],
                'category' => $this->checkJson($info['category']),
                'contract_address' => $this->checkJson($info['contract_address']),
                'date_added' => Carbon::parse($this->checkJson($info['date_added'])),
                'date_launched' => Carbon::parse($info['date_launched']),
                'description' => $info['description'],
                'infinite_supply' => $this->checkJson($info['infinite_supply']),
                'is_hidden' => $this->checkJson($info['is_hidden']),
                'logo' => $this->checkJson($info['logo']),
                'name' => $this->checkJson($info['name']),
                'notice' => $this->checkJson($info['notice']),
                'platform' => $this->checkJson($info['platform']),
                'self_reported_circulating_supply' => $this->checkJson($info['self_reported_circulating_supply']),
                'self_reported_market_cap' => $this->checkJson($info['self_reported_market_cap']),
                'self_reported_tags' => $this->checkJson($info['self_reported_tags']),
                'slug' => $this->checkJson($info['slug']),
                'subreddit' => $this->checkJson($info['subreddit']),
                'symbol' => $this->checkJson($info['symbol']),
                'tag_groups' => $this->checkJson($info['tag-groups']),
                'tag_names' => $this->checkJson($info['tag-names']),
                'tags' => $this->checkJson($info['tags']),
                'twitter_username' => $this->checkJson($info['twitter_username']),
                'urls' => $this->checkJson($info['urls']),
            ];

        }

        CoinInfo::upsert($values, 'id');

    }

    public function checkJson($value)
    {
        if (is_array($value)) return json_encode($value);
        return $value;
    }


}
