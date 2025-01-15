<?php

require_once '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST['username'];
    $nama_petugas = $_POST['nama_petugas'];
    $password = md5($_POST['password']); // Hash password menggunakan MD5
    $telepon = $_POST['telepon'];
    $level = $_POST['level'];

    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
        // Jika username belum terdaftar, masukkan data ke database
        $sql = "INSERT INTO petugas (username, nama_petugas, password, telp, level) VALUES ('$username', '$nama_petugas', '$password', '$telepon', '$level')";
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Pendaftaran berhasil!');</script>";
            header("location:index.php"); // Redirect ke halaman login setelah berhasil
            exit();
        } else {
            echo "<script>alert('Terjadi kesalahan!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
</head>

<body>
    <h1>Registrasi Petugas Baru</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nama_petugas">Nama</label>
            <input type="text" name="nama_petugas" id="nama_petugas" required>
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" required>
        </div>
        <div class="form-item">
            <label for="level">Role</label>
            <select name="level" class="form-control" required >
            <option value="">Pilih Level Petugas </option>
            <option value="admin"> Admin </option>
            <option value="petugas"> Petugas </option>
        </select>
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="index.php">Batal</a>
</body>

</html>