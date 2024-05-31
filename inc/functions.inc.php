<?php

/**
 * Check if the email exists in the database.
 */
function checkEmailExists($conn, $email): bool
{
    // Check if the Email Already Exists
    $query = "SELECT email FROM users WHERE email = ?;";
    $result = mysqli_execute_query($conn, $query, [$email]);
    if (mysqli_num_rows($result) > 0) { // checks for the email exists Already or not.
        return $result = true;
    } else {
        return $result = false;
    }
} // end function.


function registerUser($conn, $name, $email, $password)
{
    //Hash the Password first
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users(name,email,password)VALUES(?,?,?);";
    mysqli_execute_query($conn, $query, [$name, $email, $hashedPassword]);
    header("location: ../register.php?error=none", true, 303);
    exit;
}

function checkPassword($conn, $email, $password)
{
    $query = "SELECT id, name, password FROM users WHERE email = ?;";
    $result = mysqli_execute_query($conn, $query, [$email]);
    if ($row = mysqli_fetch_assoc($result)) {
        $dbPwd =  $row['password'];
        if ($dbPwd && password_verify($password, $dbPwd)) {
            session_start();
            $_SESSION['ID'] = $row['id'];
            $_SESSION['NAME'] = $row['name'];
            header("location: ../Dashboard.php", true, 303);
            exit;
        }
    } else {
        header("location: ../login.php?error=incorrect_password");
        exit;
    }
}
