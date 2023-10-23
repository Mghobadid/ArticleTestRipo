<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cryptocurrencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->string('slug');
            $table->integer('cmc_rank');
            $table->double('market_cap');
            $table->double('price');
            $table->double('price_ir');
            $table->double('volume_24h');
            $table->double('percent_change_1h');
            $table->double('percent_change_24h');
            $table->double('percent_change_7d');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cryptocurrencies');
    }
};
