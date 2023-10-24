<?php

namespace App\Console\Commands;

use App\Models\cryptocurrencies;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdateCryptocurrencyDataCommand extends Command
{
    protected $signature = 'update:cryptocurrency-data';

    protected $description = 'Command description';

    public function handle(): void
    {
        $price = Cache::remember('getUSDTPrice', 60, function () {
            return $this->getUSDTPrice();
        });
        // Last price
        $lastPrice = $price['last'];
        $marketCoins = Cache::remember('getMarketCoins', 60, function () {
            return $this->getMarketCoins();
        });

        $inset_obj = [];
        foreach ($marketCoins->data as $coin)
        {
            $inset_obj[] = [
                'id' => $coin->id,
                'name' => $coin->name,
                'symbol' => $coin->symbol,
                'slug' => $coin->slug,
                'cmc_rank' => $coin->cmc_rank,
                'price' => $coin->quote->USD->price,
                'price_ir' => ($coin->quote->USD->price * $lastPrice),
                'volume_24h' => $coin->quote->USD->volume_24h,
                'percent_change_1h' => $coin->quote->USD->percent_change_1h,
                'percent_change_24h' => $coin->quote->USD->percent_change_24h,
                'percent_change_7d' => $coin->quote->USD->percent_change_7d,
                'market_cap' => $coin->quote->USD->market_cap
            ];
        }
        cryptocurrencies::upsert($inset_obj, 'id');
    }


    protected function getUSDTPrice()
    {
        $response = Http::get('https://api.exir.io/v2/ticker?symbol=usdt-irt');
        if (!$response->successful())
        {
            Log::channel('daily')->error($response->object()->status->error_message);
            exit();
        }
        return (array)$response->json();
    }

    protected function getMarketCoins()
    {
        $headers = ['X-CMC_PRO_API_KEY' => env('X_CMC_PRO_API_KEY')];
        $response = Http::withHeaders($headers)->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=1000');
        if (!$response->successful())
        {
            Log::channel('daily')->error($response->object()->status->error_message);
            exit();
        }
        return $response->object();
    }
}
