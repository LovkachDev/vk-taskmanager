<?php

    session_start();

    if($_SESSION['userAuth'] == '')
    {
        header('Location: ../auth.php'); 
    }

?>