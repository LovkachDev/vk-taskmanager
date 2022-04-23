<?php
    session_start();
    if($_SERVER['REQUEST_URI'] == "/")
    {
        if($_SESSION['userAuth']!='')
        {
            header('Location: ./manage/'); 
        }
    }
    if($_SERVER['REQUEST_URI'] == "/auth.php")
    {
        if($_SESSION['userAuth']!='')
        {
            header('Location: ./manage/'); 
        }
    }
    else if($_SERVER['REQUEST_URI'] != "/")
    {
        if($_SERVER['REQUEST_URI'] != "/auth.php")
        {
            if($_SESSION['userAuth']=='')
            {
                header('Location: ../auth.php'); 
            }
        }
        else if($_SERVER['REQUEST_URI'] == "/")
        {
            
        }

    }
?>