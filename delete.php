<?php
require_once('DB.php');

$koneksi = new DB($host, $user, $pass, $db);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_barang = $_GET['id'];

    if ($koneksi->delete($id_barang)) {
        header('Location: index.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}
?>