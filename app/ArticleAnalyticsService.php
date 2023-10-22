<?php

namespace App;

use App\Models\Article;
use App\Models\ArticleLike;
use Illuminate\Support\Carbon;

class ArticleAnalyticsService
{
    public function getLikesCount(Carbon $from, Carbon $to)
    {
        return ArticleLike::whereBetween('created_at', [$from, $to])->count();
    }

    public function getViewCount(Carbon $from, Carbon $to)
    {
        return Article::whereBetween('created_at', [$from, $to])->sum('view_count');
    }

    public function getMostViewed(Carbon $from, Carbon $to)
    {
        return Article::whereBetween('created_at', [$from, $to])->MostViewd()->first();
    }

    public function getMostLikedArticle(Carbon $from, Carbon $to)
    {
        return Article::whereBetween('created_at', [$from, $to])->MostLiked()->first();
    }
    public function getCountByType(Carbon $from, Carbon $to)
    {
        return Article::whereBetween('created_at', [$from, $to])->CountByType()->get();
    }
}
