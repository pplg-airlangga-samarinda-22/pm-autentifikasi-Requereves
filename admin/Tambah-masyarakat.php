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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Registrasi Pengguna Baru</h1>
        <form action="" method="post">
            <div class="mb-4">
                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                <input type="text" name="nik" id="nik" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="tel" name="telepon" id="telepon" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="w-full p-2 border rounded">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Register</button>
                <a href="loginMasyarakat.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>
