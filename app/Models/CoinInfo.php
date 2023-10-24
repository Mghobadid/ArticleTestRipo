<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoinInfo extends Model
{
    public $timestamps = false;
    protected $casts = [
        'tag_groups' => 'json',
        'tag_names' => 'json',
        'contract_address' => 'json',
        'tags' => 'json',
        'urls' => 'json',
        'platform' => 'json',
    ];

    public function cryptocurrency(): BelongsTo
    {
        return $this->belongsTo(cryptocurrencies::class,'cryptocurrency_id');
    }
}
