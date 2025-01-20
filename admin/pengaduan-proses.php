<?php
    require "../koneksi.php";


    if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
          $id = $_GET['id'];
          $sql = "SELECT * FROM pengaduan where id_pengaduan=?"; 
          $row = $koneksi -> execute_query($sql, [$id])-> fetch_array();

          $nik = $row['nik'];
          $laporan = $row['laporan'];
          $foto = $row['foto'];
          $status = $row['status'];

        }elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id = $_GET['id'];

            $sql = "UPDATE pengaduan SET status='proses, WHERE id_pengaduan=?";
            $row = $koneksi -> execute_query($sql, [$id]);

            if ($row) {
                header("Location:pengaduan.php");
            }
        }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>

<body>
    <h1>Verifikasi dan Validasi Pengaduan</h1>
    <a href="pengaduan.php">Kembali</a>
    <form action="" method="post">
        <div class="form-item">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan" readonly><?= $laporan ?></textarea>
        </div>
        <div class="form-item">
            <label for="foto">Foto</label>
            <img src="../gambar/<?= $foto ?>" alt="" width="250px">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>