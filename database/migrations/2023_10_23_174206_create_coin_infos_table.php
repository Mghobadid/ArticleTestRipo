<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('coin_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cryptocurrency_id')->unique()->constrained('cryptocurrencies')->cascadeOnDelete();
            $table->string('category')->nullable();
            $table->json('contract_address')->nullable();
            $table->dateTime('date_added')->nullable();
            $table->dateTime('date_launched')->nullable();
            $table->text('description')->nullable();
            $table->boolean('infinite_supply')->nullable();
            $table->boolean('is_hidden')->nullable();
            $table->text('logo')->nullable();
            $table->string('name')->nullable();
            $table->text('notice')->nullable();
            $table->json('platform')->nullable();
            $table->double('self_reported_circulating_supply')->nullable();
            $table->double('self_reported_market_cap')->nullable();
            $table->json('self_reported_tags')->nullable();
            $table->string('slug');
            $table->string('subreddit');
            $table->string('symbol');
            $table->json('tag_groups')->nullable();
            $table->json('tag_names')->nullable();
            $table->json('tags')->nullable();
            $table->string('twitter_username')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->json('urls')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coin_infos');
    }
};
