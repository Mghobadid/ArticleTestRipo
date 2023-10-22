<?php

namespace App\Enums;

enum ArticleTypeEnum: string
{
    case Post = 'post';
    case Video = 'video';
    case Book = 'book';
}
