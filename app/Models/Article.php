<?php

namespace App\Models;

use App\Enums\ArticleTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => ArticleTypeEnum::class
    ];

    public function likes()
    {
        return $this->hasMany(ArticleLike::class, 'article_id');
    }

    public function scopeMostLiked(Builder $query)
    {
        return $query
            ->withCount('likes')
            ->orderBy('likes_count', 'desc');
    }

    public function scopeMostViewd(Builder $query)
    {
        return $query->orderByDesc('view_count');
    }

    public function scopeCountByType(Builder $query)
    {
        return $query->selectRaw('type, COUNT(*) as count')
            ->groupBy('type');
    }

}
