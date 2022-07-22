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

    // ユーザーIDとツイートIDを渡すと、ツイートの持ち主が当該ユーザーかを判定
    public function checkOwnTweet(int $userId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet) {
            return false;
        }

        return $tweet->user_id === $userId;
    }
}
