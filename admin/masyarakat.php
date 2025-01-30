<?php 
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Data Masyarakat</h1>
        <div class="flex justify-between mb-4">
            <a href="index.php" class="text-blue-500 hover:underline">Kembali</a>
            <a href="Tambah-masyarakat.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah</a>
        </div>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">No</th>
                    <th class="border p-2">NIK</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Username</th>
                    <th class="border p-2">Telepon</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                $sql = "SELECT * FROM masyarakat";
                $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
                foreach($rows as $row) {
                ?>
                <tr class="border">
                    <td class="border p-2 text-center"><?= ++$no ?></td>
                    <td class="border p-2 text-center"><?= $row['nik'] ?></td>
                    <td class="border p-2 text-center"><?= $row['nama'] ?></td>
                    <td class="border p-2 text-center"><?= $row['username'] ?></td>
                    <td class="border p-2 text-center"><?= $row['telp'] ?></td>
                    <td class="border p-2 text-center">
                        <a href="masyarakat-edit.php?nik=<?= $row['nik'] ?>" class="text-yellow-500 hover:underline">Edit</a> |
                        <a href="masyarakat-hapus.php?nik=<?= $row['nik'] ?>" class="text-red-500 hover:underline">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
