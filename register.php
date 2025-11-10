<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
    <div class="div-content">
        <h1>Register</h1>
        <div class="div-box">
            <form action="" method="post">
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                 <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div>
                    <input type="submit" name="submit" value="Register">
                </div>
            </form>

            <?php
                if (isset($_POST['submit'])) {
                    $email = htmlspecialchars($_POST['email']);
                    $password = htmlspecialchars($_POST['password']);
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
                    $num = mysqli_num_rows($query);

                    if ($num > 0) {
                        echo "Email sudah terdaftar!";
                    } else {
                        $queryInsert = mysqli_query($conn, "INSERT INTO users (email, password) VALUES ('$email', '$encryptedPassword')");
                        if ($queryInsert) {

                            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
                            exit;
                        } else {
                            echo "Gagal registrasi!";
                        }
                    }
                }

                if (isset($_GET['success'])) {
                    echo "Berhasil registrasi!";
                }
                ?>

            </div>
        </div>
    </div>
</body>
</html>