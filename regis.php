<?php 
require 'function.php';
	// cek apakah tombol submit sudah ditekan atau belum
	if (isset($_POST['register'])) {
		if (registrasi($_POST) > 0) {
			echo "<script>
					alert('user baru berhasil ditambahkan!')
				  </script>";
            header("location: login.php");
		} else {
			echo mysqli_error($conn);
		}
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

<div class="containerKonfirm">
	
	<img src="assets/img/gedung.png" alt="" class="login_img">
    <form action="" method="post" class="login_formRegis">
		<div class="colRegis">
			<a href="login.php" class="back"><i class="ri-arrow-left-line"></i></a>
			<h1 class="login_titleRegis">Registrasi</h1><br>

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

				<div class="login_box">
				<i class="ri-lock-2-line login_icon"></i>

					<div class="login_box-input">
						<input type="password" class="login_input" name="password2" id="password2" placeholder=" " required>
						<label for="password2" class="login_label">Konfirmasi Password !</label>
					</div>
				</div>
			</div>

			<button class="login_button" type="submit" name="register">Register</button>
		</div>
		<div class="containerRegister">
			<img src="assets/img/dekot2.png" alt="">
	</div>
    </form>
</div>

</body>
</html>