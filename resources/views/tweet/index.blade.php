<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kodokutter 2</title>
</head>

<body>

    <h1>Kodokutter 2</h1>
    @auth
        <div>
            <p>投稿フォーム</p>
            @if (session('feedback.success'))
                <p style="color: green;">{{ session('feedback.success') }}</p>
            @endif
            <!-- action にはエンドポイントを指定する -->
            <form action="{{ route('tweet.create') }}" method="post">
                <!-- Laravelではこの記述を入れるだけでCSRF対策のためのトークンを生成、送信できる see: p76 -->
                @csrf
                <label for="tweet-content">つぶやき</label>
                <span>140字まで</span>
                <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
                @error('tweet')
                    <p style="color: red:">{{ $message }}</p>
                @enderror
                <button type="submit">投稿</button>
            </form>
        </div>
    @endauth
    @foreach ($tweets as $tweet)
        <details>
            <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
            @if (\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
                <div>
                    <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                    <!-- 削除機能はボタンしかないが、「リクエストを発行するUI」という意味でformで実装するのが適切 -->
                    <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">削除</button>
                    </form>
                </div>
            @else
                <p>編集不可</p>
            @endif
        </details>
    @endforeach
</body>

</html>
