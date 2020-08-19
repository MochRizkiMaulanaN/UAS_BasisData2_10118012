<?php
include '../functions.php';

//jika dipencet tombol cari
if (isset($_POST['cari'])) {
    $mahasiswa = cari_dosen($_POST['keyword']);
} else {
    $mahasiswa = tampil("SELECT * FROM dosen");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Dosen</title>
</head>

<body>

    <h2>Data Dosen</h2>
    <a href="tambah_dosen.php"><button>Tambah Data</button></a><br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Berdasarkan NIP" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form><br><br>

    <table style=" text-align: center;" border="1">
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($mahasiswa) {
            $no = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mhs["nip"]; ?></td>
                    <td><?= $mhs["nama_dosen"]; ?></td>
                    <td>
                        <a href="ubah_dosen.php?id=<?= $mhs["nip"]; ?>">Ubah</a>
                        <a href="hapus_dosen.php?id=<?= $mhs["nip"]; ?>" onclick="return confirm('Apkah Anda Yakin..?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else {
            echo "<tr><td colspan='4' align='center'><h5>Data Tidak Ditemukan</h5></td></tr>";
        } ?>
    </table><br>
    <a href="../index.php"><button>Kembali</button></a>

</body>

</html>