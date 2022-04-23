<?php

    require './config/db.php';
    require './session/isAuth.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "assets/style.css">
    <link rel = "stylesheet" href = "assets/media/container.css">
    <link rel = "stylesheet" href = "assets/media/prewiew.css">
    <title>Task Manager</title>
</head>
<body>
    <div class="wrapper">
        <header class = "flex jcc">
            <div class="container flex aic" style = "justify-content: space-between;">
                <div class="header__logo">
                    <a href = "/"><h2>TaskManager</h2></a>
                </div>
            </div>
        </header>
        <div class="container flex jcc" style="min-height: 90vh;">
            <div class="signup flex jcc aic">
                <div class="prewiew__login">
                    <form action="" method="post" class = "prewiew__form">
                        <p class = "form__label">E-mail</p>
                        <input class = "form__input" name = "mail">
                        <p class = "form__label mar20">Username</p>
                        <input class = "form__input" name = "login">
                        <p class = "form__label mar20">Password</p>
                        <input type = "password" class = "form__input" name = "password">
                        <button name = "submit" class = "form__button mar20">Создать</button>
                        <?php
                            $data = $_POST;
                            if(isset($data['submit']))
                            {
                                $user = R::dispense( 'users' );
                                $user->login = $data['login'];
                                $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
                                $find = R::findOne('users', 'login = ?', [$data['login']]);
                                if(count($find) != 0)
                                {
                                    echo "<div class = 'error__message flex jcc'>Пользователь с логином ". $find->login. " уже существует</div>";
                                }
                                else if(strlen($data['password']) < 7)
                                {
                                    echo "<div class = 'error__message flex jcc aic'>Пароль менее 7 символов</div>";
                                }
                                else
                                {
                                    R::store( $user );
                                    header('Location: auth.php');
                                }
                            }
                        ?>
                        <p class = "form__sign mar20">Есть аккаунт? <a href = "./auth.php" class = "link">Войти</a></p>
                    </form>
                </div>
            </div>   
        </div>
    </div>
</body>
</html>