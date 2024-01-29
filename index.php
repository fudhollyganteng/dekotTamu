<?php

session_start();

if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}



require 'function.php';
$daftamu = query("SELECT * FROM daftamu");


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Daftar Tamu</title>
  </head>
  <body>
    <div class="container">
      <img src="assets/img/gedung.png" alt="" class="login_img">
      <div class="containerRegis">
        <table border="1" cellpadding="10" cellspacing="2" class="login_form">
              <tr>
                <th>No.</th>
                <th>Dewan</th>
                <th>Nama</th>
                <th>No. telp</th>
                <th>Keperluan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
              <tr>
              <?php $i = 1; ?>
              <?php foreach ($daftamu as $row) : ?>
                <td><?= $i; ?></td>
                <td><?= $row["dewan"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["notelp"]; ?></td>
                <td><?= $row["keperluan"] ?></td>
                <td><?= $row["tanggal"] ?></td>
                <td>
                  <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
                  <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
                  return confirm('yakin');">Delete</a>
                </td>
              </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
        </table>
      </div>
    </div>
  </body>
</html>






