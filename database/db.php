<?php

$db_user = "root";
$db_host = "localhost";
$db_name = "login_system";
$db_pwd = "";

$conn = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);

if (!$conn) {
    die("Connection failed") . mysqli_connect_error() . mysqli_connect_errno();
}
