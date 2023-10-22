<?php

namespace App\Http\Controllers;

use App\ArticleAnalyticsService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ArticleController extends Controller
{
    public function show()
    {

    }

    public function index(Request $request, ArticleAnalyticsService $analytics)
    {

        $request->validate([
            'from_date' => 'sometimes|date|required',
            'to_date' => 'sometimes|date|required|after_or_equal:from_date'
        ]);;

        $from = $request->from_date ? Carbon::parse($request->from_date) : Carbon::now();
        $to = $request->to_date ? Carbon::parse($request->to_date) : Carbon::now();

        $likes_count = $analytics->getLikesCount($from, $to);
        $view_count = $analytics->getViewCount($from, $to);
        $most_viewed_article = $analytics->getMostViewed($from, $to);
        $most_liked_article = $analytics->getMostLikedArticle($from, $to);
        $count_article_types = $analytics->getCountByType($from, $to);

        return view('welcome', compact('likes_count', 'view_count', 'most_viewed_article', 'most_liked_article', 'most_liked_article', 'count_article_types'));
    }
}
