<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // TweetService はTweetモデルに依存する処理を切り出したもの
        // コントローラー自体のロジックとは独立させ、外部から受け取る(サービスコンテナによるDI)
        $tweets = $tweetService->getTweets();
        // dd はLaravel専用の開発向けヘルパー関数で、処理を途中で止めて変数の値をブラウザに表示してくれる
        // dd($tweets);

        // 第1引数は参照するViewファイルを指定
        // 第2引数はViewファイルに対して値を連想配列で渡している
        return view('tweet.index', ['tweets' => $tweets]);
    }
}
