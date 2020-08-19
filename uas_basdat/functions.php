<?php

$conn = mysqli_connect("localhost", "root", "", "db_akdmk");

function tampil($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nim = htmlspecialchars($data['nim']);
    $kode_mk = htmlspecialchars($data['kode_mk']);
    $nip = htmlspecialchars($data['nip']);
    $nilai_a = htmlspecialchars($data['nilai_a']);
    $indeks = htmlspecialchars($data['indeks']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $query = " INSERT INTO perkuliahan VALUES ('$nim','$kode_mk','$nip','$nilai_a','$indeks','$jurusan') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari_data($keyword)
{
    $query = "SELECT mahasiswa.nim,nama_mhs,n_akhir,indeks,jurusan,nama_mk,nama_dosen,sks FROM perkuliahan JOIN mahasiswa using(nim) JOIN matakuliah USING(kode_mk) JOIN dosen USING(nip) WHERE 
    nim LIKE '%$keyword%' 
    ";

    return tampil($query);
}

//mahasiswa
function tambah_mhs($data)
{
    global $conn;
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $tgl = htmlspecialchars($data['tgl']);
    $alamat = htmlspecialchars($data['alamat']);
    $jk = htmlspecialchars($data['jk']);
    $email = htmlspecialchars($data['email']);
    $query = " INSERT INTO mahasiswa VALUES ('$nim','$nama','$tgl','$alamat','$jk','$email') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cek_nim($data)
{
    global $conn;
    $nim = $data['nim'];
    $cek = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim ='$nim' ");

    return mysqli_num_rows($cek);
}

function ubah_mhs($data)
{
    global $conn;
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $tgl = htmlspecialchars($data['tgl']);
    $alamat = htmlspecialchars($data['alamat']);
    $jk = htmlspecialchars($data['jk']);
    $email = htmlspecialchars($data['email']);
    $query = " UPDATE mahasiswa SET
    nim = '$nim',
    nama_mhs = '$nama',
    tgl_lahir = '$tgl',
    alamat = '$alamat',
    jenis_kelamin = '$jk',
    email = '$email'
    WHERE nim = '$nim'
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_mhs($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$id' ");
    return mysqli_affected_rows($conn);
}

function cari_mhs($keyword)
{
    $query = " SELECT * FROM mahasiswa WHERE 
    nim LIKE '%$keyword%' OR
    nama_mhs LIKE '%$keyword%' 
    ";

    return tampil($query);
}

//dosen

function tambah_dosen($data)
{
    global $conn;
    $nip = htmlspecialchars($data['nip']);
    $nama_dos = htmlspecialchars($data['nama_dos']);
    $query = " INSERT INTO dosen VALUES ('$nip','$nama_dos') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cek_nip($data)
{
    global $conn;
    $nip = $data['nip'];
    $cek = mysqli_query($conn, "SELECT * FROM dosen WHERE nip ='$nip' ");

    return mysqli_num_rows($cek);
}

function ubah_dosen($data)
{
    global $conn;
    $nip = htmlspecialchars($data['nip']);
    $nama_dos = htmlspecialchars($data['nama_dos']);
    $query = " UPDATE dosen SET
    nip = '$nip',
    nama_dosen = '$nama_dos'
    WHERE nip = '$nip'
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_dosen($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM dosen WHERE nip = '$id' ");
    return mysqli_affected_rows($conn);
}

function cari_dosen($keyword)
{
    $query = " SELECT * FROM dosen WHERE 
    nip LIKE '%$keyword%' OR
    nama_dosen LIKE '%$keyword%' 
    ";

    return tampil($query);
}

//matakuliah

function tambah_mk($data)
{
    global $conn;
    $kode_mk = htmlspecialchars($data['kode_mk']);
    $nama_mk = htmlspecialchars($data['nama_mk']);
    $sks = htmlspecialchars($data['sks']);
    $query = " INSERT INTO matakuliah VALUES ('$kode_mk','$nama_mk','$sks') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cek_kode_mk($data)
{
    global $conn;
    $kode_mk = $data['kode_mk'];
    $cek = mysqli_query($conn, "SELECT * FROM matakuliah WHERE kode_mk ='$kode_mk' ");

    return mysqli_num_rows($cek);
}

function ubah_mk($data)
{
    global $conn;
    $kode_mk = htmlspecialchars($data['kode_mk']);
    $nama_mk = htmlspecialchars($data['nama_mk']);
    $sks = htmlspecialchars($data['sks']);
    $query = " UPDATE matakuliah SET
    kode_mk = '$kode_mk',
    nama_mk = '$nama_mk',
    sks = '$sks'
    WHERE kode_mk = '$kode_mk'
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_mk($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM matakuliah WHERE kode_mk = '$id' ");
    return mysqli_affected_rows($conn);
}

function cari_mk($keyword)
{
    $query = " SELECT * FROM matakuliah WHERE 
    kode_mk LIKE '%$keyword%' OR
    nama_mk LIKE '%$keyword%' 
    ";

    return tampil($query);
}
