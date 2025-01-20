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
    <title>Edit Petugas</title>
</head>

<body>

    <body>
        <h1>Edit Petugas</h1>
        <form action="" method="post">
            <div class="form-item">
                <label for="level">Level Akses</label>
                <select name="level" id="level">
                    <option value="" disabled selected>Pilih level akses</option>
                        <option value="admin" <?= ($level === 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="petugas" <?= ($level === 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                </select>
            </div>
            <div class="form-item">
                <label for="nama">Nama Petugas</label>
                <input type="text" name="nama" id="nama" value="<?= $nama ?>">
            </div>
            <div class="form-item">
                <label for="telepon">Telepon</label>
                <input type="tel" name="telepon" id="telepon" value="<?= $telepon ?>">
            </div>
            <div class="form-item">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $username ?>" disabled>
            </div>
            <button type="submit">Kirim</button>
            <a href="petugas.php">Batal</a>
        </form>
    </body>

</html>
</body>

</html>