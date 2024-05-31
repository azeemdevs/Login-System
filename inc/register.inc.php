<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['submitBtn'])) {
    // Get values from the inputs
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirmPassword = $_REQUEST['confirm_password'];

    // Database Connection Link
    require_once '../database/db.php';
    require_once '../inc/functions.inc.php';
    // Validate if All Fields are empty
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['emptyFields'] = "Please Fill All Fields";
        header("location: ../register.php?error=Please Fill All Fields", true, 303);
        exit;
    }
    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['invalidEmail'] = "Please Enter Correct Email Address";
        header("location: ../register.php?error=invalid Email", true, 303);
        exit;
    }

    // Validate Password
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
        $_SESSION['invalidPassword'] = "Passwords must be alphanumeric, 8 or more characters Long";

        header("location: ../register.php?error=Please Type Password in Correct Format", true, 303);
        exit;
    }

    // Check password and confirm password
    if ($password !== $confirmPassword) {
        $_SESSION['confirmPassword'] = "Password and Confirm Password do not match";
        header("location: ../register.php?error=confirm password not match", true, 303);
        exit;
    }

    // Check if the Email Already Exists
    if (!checkEmailExists($conn, $email)) {
        registerUser($conn, $name, $email, $password);
    } else {
        $_SESSION['emailTaken'] = "Email Taken Already Try Different";
        header("location: ../register.php?error=Email Taken Try Another", true, 303);
        exit;
    }
} else {
    $_SESSION['is_method'] = "Get Method Not Allowed";
    header("location: ../register.php?error=getmethodnotsupported", true, 302);
    exit;
}
