<?php

session_start();
require "connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="main">
        <div class="div-content">
            <h1>Login</h1>
            <div class="div-box">
                <form action="" method="post">
                    <div >
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off">
                    </div>

                    <div >
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div >
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>
                <?php

if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($conn,"SELECT *  FROM users WHERE email='$email'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $data = mysqli_fetch_array($query);
        if(password_verify($password, $data['password'])){
            $_SESSION['logged_in'] = true;
            $_SESSION['email' ] = $data['email'];

            header("location: index.php");

        } else {
            echo "password kamu salah";
        }
    }
    else {
        echo "akun kamu tidak terdfatar";
    }
}

                ?>
            </div>
        </div>
    </div>

</body>
</html>
