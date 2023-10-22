<?php

namespace App\Http\Controllers;

use App\ArticleAnalyticsService;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string',
            'content' => 'string',

        ]);
        $translates_key = ['es', 'ko', 'tr'];
        $translatable_fields = ['title', 'body'];
        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $tr->setSource('en');
        $translated = [];
        foreach ($translates_key as $key) // add original filed to array
        {
            $tr->setTarget($key);
            foreach ($translatable_fields as $field)
            {
                $translated[$field . '_' . $key] = $tr->translate(\request($field)); // ex output:title_tr , body_tr
            }
        }
        $request->merge($translated);

        Article::create($request->toArray());

    }

    public function store_v2(Request $request)
    {
        $request->validate([
            'title' => 'string',
            'content' => 'string',

        ]);
        $translates_key = ['es', 'ko', 'tr'];
        $translatable_fields = ['title', 'body'];
        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $tr->setSource('en');
        $translated = [];

        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;
        $tr->setTarget('tr');
        $article->title_tr = $tr->translate($request->title);
        $article->body_tr = $tr->translate($request->body);
        $tr->setTarget('es');
        $article->title_es = $tr->translate($request->title);
        $article->body_es = $tr->translate($request->body);
        $tr->setTarget('ko');
        $article->title_ko = $tr->translate($request->title);
        $article->body_ko = $tr->translate($request->body);
        $article->save();

    }
}
