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
    <p>投稿フォーム</p>
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
    @foreach ($tweets as $tweet)
        <p>{{ $tweet->content }}</p>
    @endforeach
</body>

</html>
