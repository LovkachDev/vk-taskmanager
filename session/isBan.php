<?php

    $user = R::findOne('users', 'login = ?', [$_SESSION['userAuth']]);
    if($user->ban == 1)
    {
        header('Location: ../ban.php');
    }
    

?>