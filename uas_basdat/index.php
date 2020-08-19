<?php

include 'functions.php';

//jika dipencet tombol cari
if (isset($_POST['cari'])) {
    $mhs = cari_data($_POST['keyword']);
} else {
    $mhs = tampil("SELECT mahasiswa.nim,nama_mhs,n_akhir,indeks,jurusan,nama_mk,nama_dosen,sks FROM perkuliahan JOIN mahasiswa using(nim) JOIN matakuliah USING(kode_mk) JOIN dosen USING(nip)");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Perkuliahan</title>
</head>

<body>

    <h2>Data Perkuliahan</h2>
    <a href="tambah_data.php"><button>Tambah Data</button></a><br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Bedasarkan NIM" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form><br><br>

    <table style=" text-align: center;" border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Nama Dosen</th>
            <th>Nilai Akhir</th>
            <th>Indeks</th>
            <th>Jurusan</th>
        </tr>
        <?php
        if ($mhs) {
            $no = 1;
            foreach ($mhs as $data) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?= $data["nim"]; ?></td>
                    <td><?= $data["nama_mhs"]; ?></td>
                    <td><?= $data["nama_mk"]; ?></td>
                    <td><?= $data["sks"]; ?></td>
                    <td><?= $data["nama_dosen"]; ?></td>
                    <td><?= $data["n_akhir"]; ?></td>
                    <td><?= $data["indeks"]; ?></td>
                    <td><?= $data["jurusan"]; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php } else {
            echo "<tr><td colspan='9' align='center'><h5>Data Tidak Ditemukan</h5></td></tr>";
        } ?>
    </table><br>
    <table>
        <tr>
            <td><a href="mahasiswa/index.php"><button>Tabel Mahasiswa</button></a></td>
            <td><a href="matakuliah/index.php"><button>Tabel Matakuliah</button></a></td>
            <td><a href="dosen/index.php"><button>Tabel Dosen</button></a></td>
        </tr>
    </table>

</body>

</html>