<?php
require "functions.php";

$nim = tampil("SELECT nim FROM mahasiswa");
$kode_mk = tampil("SELECT kode_mk FROM matakuliah");
$nip = tampil("SELECT nip FROM dosen");

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
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
    <title>Halaman perkuliahan</title>
</head>

<body>
    <h1>Tambah Data Perkuliahan</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>
                    <select name="nim" id="nim">
                        <?php foreach ($nim as $nm) : ?>
                            <option value="<?= $nm['nim']; ?>"><?= $nm['nim']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kode Matakuliah</td>
                <td>:</td>
                <td>
                    <select name="kode_mk" id="kode_mk">
                        <?php foreach ($kode_mk as $kd_mk) : ?>
                            <option value="<?= $kd_mk['kode_mk']; ?>"><?= $kd_mk['kode_mk']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td>
                    <select name="nip" id="nip">
                        <?php foreach ($nip as $np) : ?>
                            <option value="<?= $np['nip']; ?>"><?= $np['nip']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nilai Akhir</td>
                <td>:</td>
                <td><input type="number" name="nilai_a" id="nilai_a" required></td>
            </tr>
            <tr>
                <td>Indeks</td>
                <td>:</td>
                <td><input type="text" name="indeks" id="indeks" required></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" required></td>
            </tr>
            <tr>
                <td colspan="3"><button type="submit" name="submit">Tambah</button></td>
            </tr>
        </table>
    </form><br>
    <a href="index.php"><button>Kembali</button></a>
</body>

</html>