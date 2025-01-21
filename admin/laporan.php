<?php 
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>
<body>
    
    <a href="javascript:window.print();">Cetak</a>
    <table>
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>NIK Pelapor</th>
            <th>Isi Laporan</th>
            <th>Petugas</th>
            <th>Status</th>
        </thead>
        <tbody>
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
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row['nama_pelapor'] ?></td>
                    <td><?= $row['tgl_pengaduan'] ?></td>
                    <td><?= $row['nik'] ?></td>
                    <td><?= $row['isi_laporan'] ?></td>
                    <td><?= $row['nama_petugas'] ?></td>
                    <td><?= ($row['status']== 0)? 'menunggu':(($row['status']=='proses')?'diproses':'selesai') ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>