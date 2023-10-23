<?php

namespace App\Console\Commands;

use App\Models\cryptocurrencies;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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
        return (array)$response->json();
    }

    protected function getMarketCoins()
    {
        $headers = [
            // 'X-CMC_PRO_API_KEY' => '0af4288d-7634-49c9-9338-8a7798e06d5c'
            // 'X-CMC_PRO_API_KEY' => '134e7a1d-8a71-4140-94d3-dc142efec103'
            'X-CMC_PRO_API_KEY' => 'bde58904-5d32-4386-ab66-cbf98b060394'
            // 'X-CMC_PRO_API_KEY' => 'ba600f64-130c-431a-9848-71cf3966d0ce'
        ];
        $response = Http::withHeaders($headers)->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=1000');
        return $response->object();
    }
    protected function getMarketCoin($symbol)
    {
        $address = [
            'https://pro-api.coinmarketcap.com', 'v1', 'cryptocurrency', 'quotes', "latest?symbol={$symbol}"
        ];

        $headers = [
            // 'X-CMC_PRO_API_KEY' => '0af4288d-7634-49c9-9338-8a7798e06d5c'
            // 'X-CMC_PRO_API_KEY' => '134e7a1d-8a71-4140-94d3-dc142efec103'
            'X-CMC_PRO_API_KEY' => 'bde58904-5d32-4386-ab66-cbf98b060394'
            // 'X-CMC_PRO_API_KEY' => 'ba600f64-130c-431a-9848-71cf3966d0ce'
        ];

        $response = \PG\Request\Request::instance()
            ->setAddress($address)
            ->setHeaders($headers)
            ->getResponse()
            ->asObject();

        return $response;
    }
    protected function getMarketCoinInfo($symbol)
    {
        $address = [
            'https://pro-api.coinmarketcap.com', 'v2', 'cryptocurrency', "info?symbol={$symbol}"
        ];

        $headers = [
            // 'X-CMC_PRO_API_KEY' => '0af4288d-7634-49c9-9338-8a7798e06d5c'
            // 'X-CMC_PRO_API_KEY' => '134e7a1d-8a71-4140-94d3-dc142efec103'
            'X-CMC_PRO_API_KEY' => 'bde58904-5d32-4386-ab66-cbf98b060394'
            // 'X-CMC_PRO_API_KEY' => 'ba600f64-130c-431a-9848-71cf3966d0ce'
        ];

        $response = \PG\Request\Request::instance()
            ->setAddress($address)
            ->setHeaders($headers)
            ->getResponse()
            ->asObject();

        return $response;
    }
}
