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
    @foreach ($tweets as $tweet)
        <p>{{ $tweet->content }}</p>
    @endforeach
</body>

</html>
