<?php

namespace App\Console\Commands;

use App\Models\CoinInfo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCryptoInfoCommand extends Command
{
    protected $signature = 'update:crypto-info';

    protected $description = 'Command description';

    public function handle(array $ids): void
    {

    }
}
