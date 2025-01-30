<?php 
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Data Petugas</h1>
        <div class="mb-4">
            <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kembali</a>
            <a href="tambahPetugas.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 ml-2">Tambah</a>
        </div>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2">NIK Pelapor</th>
                    <th class="border border-gray-300 px-4 py-2">Isi Laporan</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                $sql = "SELECT * FROM pengaduan";
                $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
                foreach($rows as $row) {
                    ?>
                    <tr class="bg-white border border-gray-300">
                        <td class="px-4 py-2 border border-gray-300 text-center"><?= ++$no ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-center"><?= $row['tgl_pengaduan'] ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-center"><?= $row['nik'] ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-center"><?= $row['isi_laporan'] ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <?= ($row['status']== 0)? 'Menunggu':(($row['status']=='proses')?'Diproses':'Selesai') ?>
                        </td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <?php if ($row['status']==0 ) { ?>
                                <a href="pengaduan-proses.php?id=<?=$row['id_pengaduan']?>" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Verifikasi</a>
                            <?php } elseif ($row['status']== 'proses') { ?>
                                <a href="pengaduan-selesai.php?id=<?=$row['id_pengaduan']?>" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Tanggapi</a>
                            <?php } elseif ($row['status']== 'selesai') { ?>
                                <a href="pengaduan-lihat.php?id=<?=$row['id_pengaduan']?>" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">Lihat</a>
                            <?php } ?>
                            <a href="pengaduan-hapus.php?id=<?=$row['id_pengaduan']?>" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</a>
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