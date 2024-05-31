<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Azeem</title>
</head>

<body>
    <?php if (isset($_SESSION['ID'])) : ?>
        <h3>Welcome to Home Page. <strong><?= $_SESSION['NAME']; ?></strong></h3>
        <div>
            <a href="./logout.php" target="_self">Logout</a>
        </div>
    <?php endif; ?>
</body>

</html>