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
                        <p class = "form__label">Username</p>
                        <input class = "form__input" name = "login">
                        <p class = "form__label mar20">Password</p>
                        <input name = "password" type = "password" class = "form__input">
                        <button name= "submit" class = "form__button mar20">Войти</button>
                        <?php
                            $data = $_POST;
                            if(isset($data['submit']))
                            {
                                $find = R::findOne('users', 'login = ?', [$data['login']]);
                                if($find)
                                {
                                    if(password_verify($data['password'], $find->password))
                                    {
                                        $_SESSION['userAuth'] = $find->login;
                                        $_SESSION['userId'] = $find->id;
                                        header('Location: ./manage/');
                                    }
                                }
                                else
                                {
                                    echo "<div class = 'error__message flex jcc'>Неверный e-mail или пароль</div>";
                                }
                            }
                        ?>
                        <p class = "form__sign mar20"> Нет аккаунта? <a href = "/" class = "link">Создать</a></p>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>