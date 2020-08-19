<?php
require_once '../functions.php';

if (isset($_POST['submit'])) {
    if (cek_nip($_POST) > 0) {
        echo "

            <script>
                alert('NIP Sudah Ada, Silahkan Input Kembali');
                document.location.href='tambah_dosen.php';
            </script>
    
        ";
    } else   
    if (tambah_dosen($_POST)) {
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
    <title>Tambah Data Dosen</title>
</head>

<body>
    <h1>Tambah Data Dosen</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input type="number" name="nip" id="nip" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama_dos" id="nama_dos" required></td>
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