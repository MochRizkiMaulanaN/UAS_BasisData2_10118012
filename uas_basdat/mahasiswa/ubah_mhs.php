<?php
require_once '../functions.php';

$id = $_GET['id'];
$ubah = tampil(" SELECT * FROM mahasiswa WHERE nim = '$id' ")[0];
$jk = $ubah['jenis_kelamin'];

if (isset($_POST['submit'])) {
    if (ubah_mhs($_POST)) {
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
    <title>Ubah Data Mahasiswa</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="number" style=" background-color: #dcdcdc;" name="nim" id="nim" value="<?= $ubah['nim']; ?>" required readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value="<?= $ubah['nama_mhs']; ?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tgl" id="tgl" value="<?= $ubah['tgl_lahir']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" id="alamat" value="<?= $ubah['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jk" id="jk">
                        <option value="L" <?php if ($jk == "L") {
                                                echo 'selected';
                                            } ?>>L</option>
                        <option value="P" <?php if ($jk == "P") {
                                                echo 'selected';
                                            } ?>>P</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" id="email" value="<?= $ubah['email']; ?>"></td>
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