<?php
include '../functions.php';

//jika dipencet tombol cari
if (isset($_POST['cari'])) {
    $mahasiswa = cari_mk($_POST['keyword']);
} else {
    $mahasiswa = tampil("SELECT * FROM matakuliah");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Matakuliah</title>
</head>

<body>

    <h2>Data Matakuliah</h2>
    <a href="tambah_mk.php"><button>Tambah Data</button></a><br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form><br><br>

    <table style=" text-align: center;" border="1">
        <tr>
            <th>No</th>
            <th>Kode Matakuliah</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($mahasiswa) {
            $no = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mhs["kode_mk"]; ?></td>
                    <td><?= $mhs["nama_mk"]; ?></td>
                    <td><?= $mhs["sks"]; ?></td>
                    <td>
                        <a href="ubah_mk.php?id=<?= $mhs["kode_mk"]; ?>">Ubah</a>
                        <a href="hapus_mk.php?id=<?= $mhs["kode_mk"]; ?>" onclick="return confirm('Apaka Anda Yakin..?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else {
            echo "<tr><td colspan='5' align='center'><h5>Data Tidak Ditemukan</h5></td></tr>";
        } ?>
    </table><br>
    <a href="../index.php"><button>Kembali</button></a>

</body>

</html>