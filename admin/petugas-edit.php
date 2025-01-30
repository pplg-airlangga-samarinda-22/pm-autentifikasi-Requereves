<?php 

session_start();
    require "../koneksi.php";

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        $sql = "SELECT * FROM petugas WHERE id_petugas=?";
        $row = $koneksi->execute_query($sql,[$id])->fetch_assoc();

        $nama = $row['nama_petugas']; 
        $nama = $row['username']; 
        $nama = $row['password']; 
        $nama = $row['telp']; 
        $nama = $row['level']; 
    } elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_GET['id'];
        $nama = $_POST['nama'];
        $telepon = $_GET['telp'];
        $level = $_GET['level'];

        $sql = "UPDATE petugas SET nama=?, telp=? , level=? WHERE id";
        $row = $koneksi -> execute_query($sql, [$nama, $telepon, $id]);

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
    <title>Edit Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Edit Petugas</h1>
        <form action="" method="post">
            <div class="mb-4">
                <label for="level" class="block text-sm font-medium text-gray-700">Level Akses</label>
                <select name="level" id="level" class="w-full p-2 border rounded">
                    <option value="" disabled selected>Pilih level akses</option>
                    <option value="admin" <?= ($level === 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="petugas" <?= ($level === 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Petugas</label>
                <input type="text" name="nama" id="nama" value="<?= $nama ?>" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="tel" name="telepon" id="telepon" value="<?= $telepon ?>" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="<?= $username ?>" disabled class="w-full p-2 border rounded bg-gray-200">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kirim</button>
                <a href="petugas.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>
