<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'On');
    require "rb-mysql.php";
    R::setup('mysql:host=localhost;dbname=taskmanager', 'root', 'root'); 
    session_start();
?>