<?php
    session_start();
    unset($_SESSION['ID']);
    unset($_SESSION['order-place']);
    unset($_SESSION['key']);
    unset($_SESSION['lat-origin']);
    unset($_SESSION['lng-origin']);
    unset($_SESSION['lat-destination']);
    unset($_SESSION['lng-destination']);

    unset($_SESSION['start_station']);
    unset($_SESSION['end']);
    unset($_SESSION['start_time']);
    unset($_SESSION['end_time']);

    header("Location: ../login.php");
?>