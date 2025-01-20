<?php
    require "../koneksi.php";

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $nik = $_POST['nik'];

        // cek dulu apakah nik telah terdaftar
        $sql = "SELECT * FROM masyarakat WHERE nik=?";
        $cek = $koneksi->execute_query($sql, [$nik]);

    if ($cek->num_rows == 1) {
            echo"<script>alert('NIK SUDAH DIGUNAKAN');</script>";
        } else {

            $nama = $_POST['nama'];
            $telp = $_POST['telepon'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $sql = "INSERT INTO masyarakat (nik, nama, telp, username, password) values(?, ?, ?, ?, ?)";
            $row = $koneksi -> execute_query($sql, [$nik, $nama, $telp, $username, $password]);
            echo "<script>alert('Pendaftaran berhasil!')</script>";
            header("location:masyarakat.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>

<body>
    <h1>Registrasi Pengguna Baru</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" required>
        </div>
        <div class="form-item">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" required>
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="loginMasyarakat.php">Batal</a>
</body>

</html>