<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
<h1>Спасибо за регистрацию!</h1>
    <p>Ваше имя: {{ $user->name }}</p>
    <p>Ваш E-mail: {{ $user->email}}</p>
</div>
</body>
</html>