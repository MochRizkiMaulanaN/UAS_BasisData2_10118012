<?php
require_once '../functions.php';

$id = $_GET['id'];
$ubah = tampil(" SELECT * FROM dosen WHERE nip = '$id' ")[0];

if (isset($_POST['submit'])) {
    if (ubah_dosen($_POST)) {
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
    <title>Ubah Data Dosen</title>
</head>

<body>
    <h1>Ubah Data Dosen</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input type="number" style=" background-color: #dcdcdc;" name="nip" id="nip" value="<?= $ubah['nip']; ?>" required readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama_dos" id="nama_dos" value="<?= $ubah['nama_dosen']; ?>" required></td>
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