<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('coin_infos', function (Blueprint $table) {
            $table->foreignId('id')->constrained('cryptocurrencies')->cascadeOnDelete();
            $table->string('category');
            $table->json('contract_address')->nullable();
            $table->dateTime('date_added')->nullable();
            $table->dateTime('date_launched')->nullable();
            $table->text('description');
            $table->boolean('infinite_supply');
            $table->boolean('is_hidden');
            $table->string('logo');
            $table->string('name');
            $table->text('notice');
            $table->json('platform');
            $table->float('self_reported_circulating_supply');
            $table->float('self_reported_market_cap');
            $table->string('self_reported_tags');
            $table->string('slug');
            $table->string('subreddit');
            $table->string('symbol');
            $table->json('tag_groups')->nullable();
            $table->json('tag_names')->nullable();
            $table->json('tags')->nullable();
            $table->string('twitter_username');
            $table->timestamp('updated_at')->useCurrent();
            $table->json('urls');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coin_infos');
    }
};
