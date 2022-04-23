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
                    <form action="" method="post" class = "prewiew__form">
                        <p class = "form__label">Название</p>
                        <input class = "form__input" name = "title">
                        <p class = "form__label mar20">Дата начала</p>
                        <input type="date" class = "form__input" name = "start">
                        <p class = "form__label mar20">Дата окончания</p>
                        <input type="date" class = "form__input" name = "end">
                        <p class = "form__label mar20">Описание</p>
                        <input type="text" class = "form__input" name = "description">
                        <button name = "submit" class = "form__button mar20">Создать</button>
                        <?php
                            $data = $_POST;
                            $title = $data['title'];
                            $start = $data['start'];
                            $end = $data['end'];
                            $description = $data['description'];
                            if(isset($data['submit']))
                            {
                                $task = R::dispense( 'tasks' );
                                $task->tasker_id = $_SESSION['userId'];
                                $task->title = $title;
                                $task->start = $start;
                                $task->end = $end;
                                $task->description = $description;
                                R::store( $task );
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