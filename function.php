<?php

$conn = mysqli_connect("localhost", "root", "", "dekot_tamu");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	// strtolower(var) = untuk mengubah huruf yang tadinya besar menjadi kecil
	$password = mysqli_real_escape_string($conn, $data["password"]);
	// mysqli_real_escape_string(var) = untuk memungkinkan si user memasukan password dengan tanda "-_$@" dan memasukan ke data base secara aman
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			  </script>";
		return false;
	}

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT
		 username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar');
			  </script>";
		return false;
	}

	// enkripsin password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
	return mysqli_affected_rows($conn);
}

?>