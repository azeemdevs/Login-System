<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <h3>User Sign Up</h3><br>
    <p>Already Have An Account ! Sign In Now.</p>
    <a href="./login.php">Sign In</a>
    <!-- Display Error Message -->
    <?php if (isset($_SESSION['emptyFields'])) : ?>
        <strong style="color: red;"><?= $_SESSION['emptyFields'] ?></strong>
    <?php endif; ?>
    <?php if (isset($_SESSION['is_method'])) : ?>
        <strong style="color: red;"><?= $_SESSION['is_method'] ?></strong>
    <?php endif; ?>
    <form action="./inc/register.inc.php" method="POST">
        <!-- Name -->
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <!-- Email -->
        <div>
            <label for="email">email:</label>
            <input type="email" name="email" id="email">
        </div>
        <?php if (isset($_SESSION['emailTaken'])) : ?>
            <div>
                <strong style="color: red;"><?= $_SESSION['emailTaken'] ?></strong>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['invalidEmail'])) : ?>
            <div>
                <strong style="color: red;"><?= $_SESSION['invalidEmail'] ?></strong>
            </div>
        <?php endif; ?>
        <!-- Password -->
        <div>
            <label for="password">password:</label>
            <input type="password" name="password" id="password">
        </div>
        <?php if (isset($_SESSION['invalidPassword'])) : ?>
            <div>
                <strong style="color: red;"><?= $_SESSION['invalidPassword'] ?></strong>
            </div>
        <?php endif; ?>
        <!-- Confirm Password -->
        <div>
            <label for="confirm_password">confirm_password:</label>
            <input type="password" name="confirm_password" id="confirm_password">
        </div>
        <?php if (isset($_SESSION['confirmPassword'])) : ?>
            <div>
                <strong style="color: red;"><?= $_SESSION['confirmPassword'] ?></strong>
            </div>
        <?php endif; ?>
        <div>
            <button type="submit" name="submitBtn">Registers</button>
        </div>
    </form>
</body>

</html>
<?php session_unset(); ?>