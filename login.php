<?php

session_start();

require 'function.php';
if (isset($_POST["login"])) {
		
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE 
        username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION['login'] = true;

            header("location: index.php");
            exit;
        }
    }

    $error = true;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login Menu</title>
</head>
<body>

<div class="container">
    <img src="assets/img/gedung.png" alt="" class="login_img">
    <div class="containerRegister">
        <form action="" method="post" class="login_form">
            <h1 class="login_title"><img src="assets/img/dekot2.png" alt="" width="150"></h1>
            <?php 	if (isset($error)) : ?>
                <script>
                    alert('Username atau Password yang anda masukan salah');
                </script>
            <?php	endif; ?>

            <div class="login_content">
                <div class="login_box">
                    <i class="ri-user-3-line login_icon"></i>

                    <div class="login_box-input">
                        <input type="text" class="login_input" name="username" id="username" placeholder=" " required>
                        <label for="username" class="login_label">Username</label>
                    </div>
                </div>

                <div class="login_box">
                <i class="ri-lock-2-line login_icon"></i>

                    <div class="login_box-input">
                        <input type="password" class="login_input" name="password" id="password" placeholder=" " required>
                        <label for="username" class="login_label">Password</label>
                    </div>
                </div>
            </div>

            <button class="login_button" type="submit" name="login">Login</button>

            <p class="login_register">
                Don't have an account? <a href="regis.php">Register</a>
            </p>
        </form>
    </div>
    
</div>

</body>
</html>