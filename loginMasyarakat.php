<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // fungsi execute_query hanya bisa digunakan pada PHP 8.2
    $sql = "SELECT * FROM masyarakat WHERE nik=? AND username=? AND password=?";
    $row = $koneksi->execute_query($sql, [$nik, $username, $password]);

    if (mysqli_num_rows($row) == 1) {
        session_start();
        
        $user = mysqli_fetch_assoc($row);
        $_SESSION['nik'] = $nik;
        header("location: masyarakat/index.php");
        exit;    
    } else {
        echo'<script>alert("gagal login");</script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form action="" method="post" class="bg-white shadow-md rounded-lg p-8 max-w-sm w-full">
        <p class="text-xl font-semibold text-center mb-6">Silahkan Login</p>
        <div class="mb-4">
            <label for="nik" class="block text-gray-700 font-medium mb-2">NIK</label>
            <input type="text" name="nik" id="nik" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
            <input type="text" name="username" id="username" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
            <input type="password" name="password" id="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition-all duration-200">Login</button>
        <div class="flex justify-between mt-4 text-sm">
            <a href="Register.php" class="text-blue-500 hover:underline">Register</a>
            <a href="loginAdmin.php" class="text-blue-500 hover:underline">Admin</a>
        </div>
    </form>
</body>

</html>
