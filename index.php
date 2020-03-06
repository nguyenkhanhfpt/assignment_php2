<?php
    session_start();
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    require './mvc/Bridge.php';
    $myApp = new App();
?>