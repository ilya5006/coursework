<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">
    
    <title>Авторизация</title>
</head>
<body>

    <form method="POST" action="/model/signup.php">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>

    <a href="/signup">Зарегистрироваться</a>
</body>
</html>