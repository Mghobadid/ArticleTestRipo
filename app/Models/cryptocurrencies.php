<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class cryptocurrencies extends Model
{
    public function coinInfos(): HasOne
    {
        return $this->hasOne(CoinInfo::class, 'cryptocurrency_id');
    }
}
