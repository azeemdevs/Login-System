<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <h3>User Login</h3><br>
    <p>Not Have An Account ! Sign Up Now.</p>
    <a href="./register.php">Sign Up</a>
    <!-- Display Error Message -->
    <?php if (isset($_GET['error'])) : ?>
        <strong style="color: red;"><?= $_GET['error'] ?></strong>
    <?php endif; ?>
    <form action="./inc/login.inc.php" method="POST">
        <!-- Email -->
        <div>
            <label for="email">email:</label>
            <input type="email" name="email" id="email">
        </div>
        <!-- Password -->
        <div>
            <label for="password">password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit" name="submit">Sign in</button>
        </div>
    </form>
</body>

</html>