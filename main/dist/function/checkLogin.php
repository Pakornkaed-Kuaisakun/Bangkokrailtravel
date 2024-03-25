<?php
function checkLogin()
{
    if (!isset($_SESSION['ID'])) {
        //$host = $_SERVER['HTTP_HOST'];
        //$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "login.php";
        unset($_SESSION["ID"]);
        header("Location: http://www.bangkokrailtravel.com/ts/$extra");
    }
}
?>