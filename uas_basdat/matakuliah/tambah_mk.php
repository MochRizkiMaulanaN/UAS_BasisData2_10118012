<?php
require_once '../functions.php';

if (isset($_POST['submit'])) {
    if (cek_kode_mk($_POST) > 0) {
        echo "

            <script>
                alert('Kode Matakuliah Sudah Ada, Silahkan Input Kembali');
                document.location.href='tambah_mk.php';
            </script>
    
        ";
    } else   
    if (tambah_mk($_POST)) {
        echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('data gagal ditambahkan');
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
    <title>Tambah Data Matakuliah</title>
</head>

<body>
    <h1>Tambah Data Matakuliah</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Kode Matakuliah</td>
                <td>:</td>
                <td><input type="text" name="kode_mk" id="kode_mk" required></td>
            </tr>
            <tr>
                <td>Nama Matakuliah</td>
                <td>:</td>
                <td><input type="text" name="nama_mk" id="nama_mk" required></td>
            </tr>
            <tr>
                <td>SKS</td>
                <td>:</td>
                <td><input type="number" name="sks" id="sks" required></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="submit">Tambah</button>
                </td>
            </tr>
        </table>
    </form><br>
    <a href="index.php"><button>Kembali</button></a>

</body>

</html>