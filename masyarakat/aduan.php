<?php

    session_start();
    require "../koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Aduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center p-4">
    <h1 class="text-2xl font-bold text-center mb-6">HALAMAN ADUAN MASYARAKAT</h1>
    <a href="Tambahaduan.php" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Tambah Aduan</a>

    <div class="overflow-x-auto w-full max-w-4xl">
        <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Laporan</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php    
                $nik = $_SESSION['nik'];
                $no=0;
                $sql = "SELECT * FROM pengaduan WHERE nik=? order by id_pengaduan desc";
                $pengaduan = $koneksi->execute_query($sql, [$nik])->fetch_all(MYSQLI_ASSOC);
                foreach ($pengaduan as $item) {
                ?>

                <tr class="border-t">
                    <td class="px-4 py-2 text-center"><?= ++$no; ?></td>
                    <td class="px-4 py-2 text-center"><?= $item['tgl_pengaduan']; ?></td>
                    <td class="px-4 py-2"><?= $item['isi_laporan'] ?></td>
                    <td class="px-4 py-2 text-center">
                        <?= ($item['status'] === '0')? 'menunggu': (($item['status'] === 'proses')?'diproses': 'selesai') ?>
                    </td>
                    <td class="px-4 py-2 text-center">
                        <a href='edit.php?id=<?=$item['id_pengaduan']?>' class="text-blue-500 hover:underline">Edit</a>
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