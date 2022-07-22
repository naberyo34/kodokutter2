<?php

namespace App\Services;

use App\Models\Tweet;

// Tweetモデルに依存する処理をServiceとして切り出している
class TweetService
{
    public function getTweets()
    {
        // やってることはSQLと同じ
        return Tweet::orderBy('created_at', 'DESC')->get();
    }
}
