<?php

    require "../config/db.php";
    require "../session/isAuth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../assets/style.css">
    <link rel = "stylesheet" href = "../assets/media/container.css">
    <link rel = "stylesheet" href = "../assets/media/prewiew.css">
    <title>Create Task</title>
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
                    <form action="delete.php" method="post" class = "prewiew__form">
                        <p class = "form__label">ID Задания</p>
                        <input class = "form__input" name = "delete">
                        <button name = "submit" class = "form__button mar20">Удалить</button>
                        <?php
                            $data = $_POST;
                            $delete = $data['delete'];
                            if(isset($data['submit']))
                            {
                                R::hunt('tasks', 'id = ?', [$delete]);
                                header('Location: ./index.php');
                            }
                        ?>
                        <p class = "form__sign mar20"><a href = "./index.php" class = "link">На главную</a></p>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>