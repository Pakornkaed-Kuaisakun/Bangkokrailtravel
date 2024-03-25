<?php
    $host = "localhost";
    $username = "root";
    $password = "not.182550";
    $name = "ts";
    $conn = new mysqli($host, $username, $password, $name);

    if($conn->connect_error) {
        echo 'Connection to database fail';
    }

    date_default_timezone_set("Asia/Bangkok");
?>