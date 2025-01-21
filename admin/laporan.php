<?php 
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Laporan</title>
</head>
<body class="bg-gray-100 p-8">
    
<div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-center w-full">Laporan</h1>
        <a href="javascript:window.print();" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Cetak</a>
    </div>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="text-left px-6 py-4">No</th>
                <th class="text-left px-6 py-4">Nama</th>
                <th class="text-left px-6 py-4">Tanggal</th>
                <th class="text-left px-6 py-4">NIK Pelapor</th>
                <th class="text-left px-6 py-4">Isi Laporan</th>
                <th class="text-left px-6 py-4">Petugas</th>
                <th class="text-left px-6 py-4">Status</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100">
            <?php 
            $no = 0;
            $sql = "SELECT 
                        p.tgl_pengaduan, 
                        p.nik, 
                        p.isi_laporan, 
                        p.status, 
                        m.nama AS nama_pelapor, 
                        pt.nama_petugas
                    FROM pengaduan p
                    INNER JOIN masyarakat m ON p.nik = m.nik
                    LEFT JOIN tanggapan t ON p.id_pengaduan = t.id_pengaduan
                    LEFT JOIN petugas pt ON t.id_petugas = pt.id_petugas";
            $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach($rows as $row) {
                ?>
                <tr class="border-b">
                    <td class="px-6 py-4"><?= ++$no ?></td>
                    <td class="px-6 py-4"><?= $row['nama_pelapor'] ?></td>
                    <td class="px-6 py-4"><?= $row['tgl_pengaduan'] ?></td>
                    <td class="px-6 py-4"><?= $row['nik'] ?></td>
                    <td class="px-6 py-4"><?= $row['isi_laporan'] ?></td>
                    <td class="px-6 py-4"><?= $row['nama_petugas'] ?></td>
                    <td class="px-6 py-4">
                        <?= ($row['status'] == 0) ? 'Menunggu' : (($row['status'] == 'proses') ? 'Diproses' : 'Selesai') ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
