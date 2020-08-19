<?php
include '../functions.php';

//jika dipencet tombol cari
if (isset($_POST['cari'])) {
    $mahasiswa = cari_mhs($_POST['keyword']);
} else {
    $mahasiswa = tampil("SELECT * FROM mahasiswa");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Mahasiswa</title>
</head>

<body>

    <h2>Data Mahasiswa</h2>
    <a href="tambah_mhs.php"><button>Tambah Data</button></a><br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form><br><br>

    <table style=" text-align: center;" border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($mahasiswa) {
            $no = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mhs["nim"]; ?></td>
                    <td><?= $mhs["nama_mhs"]; ?></td>
                    <td><?= $mhs["tgl_lahir"]; ?></td>
                    <td><?= $mhs["alamat"]; ?></td>
                    <td><?= $mhs["jenis_kelamin"]; ?></td>
                    <td><?= $mhs["email"]; ?></td>
                    <td>
                        <a href="ubah_mhs.php?id=<?= $mhs["nim"]; ?>">Ubah</a>
                        <a href="hapus_mhs.php?id=<?= $mhs["nim"]; ?>" onclick="return confirm('Apakah Anda Yakin..?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else {
            echo "<tr><td colspan='8' align='center'><h5>Data Tidak Ditemukan</h5></td></tr>";
        } ?>
    </table><br>
    <a href="../index.php"><button>Kembali</button></a>

</body>

</html>