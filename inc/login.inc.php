<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['submit'])) {
    // Get the values from the form.
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // Database Connection Link
    require_once '../database/db.php';
    require_once '../inc/functions.inc.php';

    // Validate if All Fields are empty
    if (empty($email) || empty($password)) {
        header("location: ../login.php?error=Please Fill All Fields", true, 303);
        exit;
    }

    // Check Email existance
    if (!checkEmailExists($conn, $email)) {
        header("location: ../login.php?error=Wrong Email Provided", true, 303);
        exit;
    } else {
        // If email is found then
        checkPassword($conn, $email, $password);
    }
} else {
    header("location: ../login.php?error=getmethodnotsupported", true, 302);
    exit;
}
