<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kodokutter 2 - 編集画面</title>
</head>

<body>

    <h1>つぶやきを編集する</h1>
    <a href={{ route('tweet.index') }}>戻る</a>
    <p>投稿フォーム</p>
    @if (session('feedback.success'))
        <p style="color: green;">{{ session('feedback.success') }}</p>
    @endif
    <!-- action にはエンドポイントを指定する -->
    <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
        @method('PUT')
        @csrf
        <label for="tweet-content">つぶやき</label>
        <span>140字まで</span>
        <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力">{{ $tweet->content }}</textarea>
        @error('tweet')
            <p style="color: red:">{{ $message }}</p>
        @enderror
        <button type="submit">保存</button>
    </form>
</body>

</html>
