<?php
require_once('DB.php');

$koneksi = new DB($host, $user, $pass, $db);

$id_barang = $_GET['id'];

$data_barang = $koneksi->getById($id_barang);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_barang = $_POST['id'];
    $nama_barang = $_POST['nama'];
    $stok = $_POST['stok'];
    $harga_barang = $_POST['harga'];
    $tgl_masuk = $_POST['tgl'];

    if ($koneksi->update($id_barang, $nama_barang, $stok, $harga_barang, $tgl_masuk)) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="form p-5 d-flex justify-content-center">
        <form action="" method="POST" class="p-5 d-flex flex-column w-50 gap-2">
            <h1>Edit Data</h1>
            <label for="nama">Nama Barang :</label>
            <input type="text" class="nama_barang" name="nama" id="nama" value="<?php echo $data_barang['nama_barang']; ?>" required>
            <label for="nama">Stok Barang :</label>
            <input type="text" class="stok_barang" name="stok" id="stok" value="<?php echo $data_barang['stok']; ?>" required>
            <label for="nama">Harga Barang :</label>
            <input type="text" class="harga_barang" name="harga" id="harga" value="<?php echo $data_barang['harga_barang']; ?>" required>
            <label for="nama">Tanggal Input :</label>
            <input type="date" class="tgl_barang" name="tgl" id="tgl" value="<?php echo $data_barang['tgl_masuk']; ?>" required>
            <input type="hidden" name="id" value="<?php echo $data_barang['id_barang']; ?>">
            <input type="submit" placeholder="Submit" class="btn-primary btn w-50 mt-3">
        </form>
    </div>
</body>

</html>