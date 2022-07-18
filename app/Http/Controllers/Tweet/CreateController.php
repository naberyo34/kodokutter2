<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     * 作成したFormRequestを読み込んで利用する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        // データベース操作に関する処理
        $tweet = new Tweet;
        // リクエストからデータを取得する
        $tweet->content = $request->tweet();
        // データベースに保存する
        $tweet->save();
        // リダイレクトする
        return redirect()->route('tweet.index');
    }
}
