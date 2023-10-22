<?php

use App\Enums\ArticleTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('title_es');
            $table->text('body_es');
            $table->string('title_tr');
            $table->text('body_tr');
            $table->string('title_ko');
            $table->text('body_ko');
            $table->string('type')->default(ArticleTypeEnum::Post->value);
            $table->unsignedInteger('view_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
