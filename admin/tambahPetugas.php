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
            header("location:petugas.php"); // Redirect ke halaman login setelah berhasil
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Registrasi Petugas Baru</h1>
        <form action="" method="post">
            <div class="mb-4">
                <label for="nama_petugas" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama_petugas" id="nama_petugas" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="tel" name="telepon" id="telepon" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="level" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="level" class="w-full p-2 border rounded" required>
                    <option value="">Pilih Level Petugas</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Register</button>
                <a href="petugas.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>
