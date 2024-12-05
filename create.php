<?php
require_once('DB.php');

$koneksi = new DB($host, $user, $pass, $db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama'];
    $stok = $_POST['stok'];
    $harga_barang = $_POST['harga'];
    $tgl_masuk = $_POST['tgl'];

    if ($koneksi->insert($nama_barang, $stok, $harga_barang, $tgl_masuk)) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD jir</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="form p-5 d-flex justify-content-center">
        <form action="" method="POST" class="p-5 d-flex flex-column w-50 gap-2">
            <h1>Masukan Data</h1>
            <label for="nama">Nama Barang :</label>
            <input type="text" class="nama_barang" name="nama" id="nama">
            <label for="nama">Stok Barang :</label>
            <input type="text" class="stok_barang" name="stok" id="stok">
            <label for="nama">Harga Barang :</label>
            <input type="text" class="harga_barang" name="harga" id="harga">
            <label for="nama">Tanggal Input :</label>
            <input type="date" class="tgl_barang" name="tgl" id="tgl">
            <input type="submit" placeholder="Submit" class="btn-primary btn w-50 mt-3">
        </form>
    </div>
</body>

</html>