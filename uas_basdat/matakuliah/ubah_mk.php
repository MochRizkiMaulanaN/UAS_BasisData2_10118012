<?php
require_once '../functions.php';

$id = $_GET['id'];
$ubah = tampil(" SELECT * FROM matakuliah WHERE kode_mk = '$id' ")[0];

if (isset($_POST['submit'])) {
    if (ubah_mk($_POST)) {
        echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('data gagal diubah');
                    document.location.href = 'index.php';
                </script>
            ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Matakuliah</title>
</head>

<body>
    <h1>Ubah Data Matakuliah</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Kode Matakuliah</td>
                <td>:</td>
                <td><input type="text" style=" background-color: #dcdcdc;" name="kode_mk" id="kode_mk" value="<?= $ubah['kode_mk']; ?>" required readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama_mk" id="nama_mk" value="<?= $ubah['nama_mk']; ?>" required></td>
            </tr>
            <tr>
            <tr>
                <td>SKS</td>
                <td>:</td>
                <td><input type="number" name="sks" id="sks" value="<?= $ubah['sks']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form><br>
    <a href="index.php"><button>Kembali</button></a>

</body>

</html>