<?php

require "session.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;   
        flex-direction: column;
    }
</style>
<body>
    <h1>Welcome <?php echo $_SESSION['email']; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>