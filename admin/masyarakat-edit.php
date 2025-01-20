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
</head>

<body>
    <h1>Masyarakat</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" required>
        </div>
        <div class="form-item">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" required>
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Submit</button>
    </form>
    <a href="loginMasyarakat.php">Batal</a>
</body>

</html>