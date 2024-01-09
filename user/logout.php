<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    header('location:../html/index.php');
?>