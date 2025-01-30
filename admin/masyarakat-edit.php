<?php
session_start();
    require "../koneksi.php";


    if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
          $nik = $_GET['nik'];
          $sql = "SELECT * FROM masyarakat where nik=?"; 
          $row = $koneksi->execute_query($sql, [$nik])->fetch_assoc();
          $nama = $row['nama'];
          $username = $row['username'];
          $telepon = $row['telp'];
        }elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $nik = $_GET['nik'];
            $nama = $_GET['nama'];
            $telepon = $_GET['telepon'];

            $sql = "UPDATE masyarakat SET nama=?, telp=? WHERE nik=?";
            $row = $koneksi -> execute_query($sql, [$nama, $telepon, $nik]);

            if ($row) {
                header("Location:masyarakat.php");
            }
        }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Form Pendaftaran Masyarakat</h1>
        <form action="" method="post" class="space-y-4">
            <div>
                <label for="nik" class="block text-gray-700 font-medium mb-2">NIK</label>
                <input type="text" name="nik" id="nik" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="nama" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="telepon" class="block text-gray-700 font-medium mb-2">Telepon</label>
                <input type="tel" name="telepon" id="telepon" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div class="flex justify-between items-center mt-6">
                <a href="loginMasyarakat.php" class="text-red-500 hover:text-red-700 font-medium">Batal</a>
                <button type="submit" class="bg-blue-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
