<?php

    require '../config/db.php';
    require '../session/isAuth.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "stylesheet" href = "../assets/style.css">
    <link rel = "stylesheet" href = "../assets/media/container.css">
    <link rel = "stylesheet" href = "../assets/media/prewiew.css">
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
        <div class="container flex jcc">
            <div class="table">
                <div class="table__prewiew">
                    Задачи
                </div>
                <div class="manage__actions flex">
                    <a href ="create.php"><div class="form__sign button">Создать</div></a>
                    <a href ="delete.php"><div class="form__sign button">Удалить</div>   </a> 
                </div>
                
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Начало</th>
                        <th>Конец</th>
                        <th>Время выполнения</th>
                        <th>Статус</th>
                        <th>Остаток (дни)</th>
                    </tr>
                    <?php
                        $tasks = R::findAll("tasks" , "tasker_id = ?" , [$_SESSION['userId']]);
                        foreach($tasks as $task)
                        {
                    ?>
                            <?php
                                $today = strtotime(date("Y-m-d"));
                        
                                $date1 = strtotime($task->start);
                                $date2 = strtotime($task->end);

                                $remainder = ($date2-$today)/86400;
                                $result = ($date2-$date1)/86400;
                            ?>
                           <?php if($remainder < 1): ?>
                            <tr style = "background-color: #ef88888e;">
                           <?php else: ?>
                            <tr>
                           <?php endif; ?>
                                <td><?=$task->id?></td>
                                <td><?=$task->title?></td>
                                <td><?=$task->start?></td>
                                <td><?=$task->end?></td>
                                <td><?=$result?> дней</td>
                                <?php
                                    if($remainder>=2)
                                    {
                                        echo '<td class = "process" >В работе</td>';
                                    }
                                    elseif($remainder < 2 && $remainder >= 1)
                                    {
                                        echo '<td class = "ended">Завершение</td>';
                                    }
                                    elseif($remainder < 1)
                                    {
                                        echo '<td class = "delayed">Задержка</td>';
                                    }
                                ?>
                                <?php
                                    if($remainder>=2)
                                    {
                                        echo '<td class = "process" >'. $remainder .'</td>';
                                    }
                                    elseif($remainder < 2 && $remainder >= 1)
                                    {
                                        echo '<td class = "ended" >'. $remainder .'</td>';
                                    }
                                    elseif($remainder < 1)
                                    {
                                        echo '<td class = "delayed" >'. $remainder .'</td>';
                                    }
                                ?>
                                
                            </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>