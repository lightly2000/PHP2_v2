<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="js/js.js"></script>
</head>
<body>
    <div class="container">
        <ul>
            <li><a href="?c=user&a=users">Пользователи</a></li>
            <li><a href="?c=user&a=user">Пользователь</a></li>
        </ul>
    </div>
    <div class="container">
        <ul>
            <li><a href="?c=good&a=goods">Товары</a></li>
            <li><a href="?c=good&a=good">Товар</a></li>
        </ul>
    </div>

    <select id="bgchoice" onchange="changeBG()">
        <option>Цвет фона</option>
        <option value="ivory">Ivory</option>
        <option value="pink">Pink</option>
    </select>

    <div class="content"><?= $content ?></div>

<script>

</script>
</body>
</html>