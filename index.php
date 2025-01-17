<?php
require_once('DB.php');
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br />
                <a href="../create.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
                <table class="table table-hover table-bordered" style="margin-top: 10px">
                    <tr class="success">
                        <th width="50px">No</th>
                        <th>Nama</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Alamat</th>
                        <th>Telpon</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM transaksi";
                    $row = $koneksi->query($sql);
                    $hasil = $row->fetchAll();
                    $a = 1;
                    foreach ($hasil as $isi) {
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><?php echo $isi['nama'] ?></td>
                            <td><?php echo $isi['nama_barang']; ?></td>
                            <td><?php echo $isi['harga_barang']; ?></td>
                            <td><?php echo $isi['alamat']; ?></td>
                            <td><?php echo $isi['telp']; ?></td>
                            <td style="text-align: center;">
                                <a href="update.php?id=<?php echo $isi['nim']; ?>" class="btn btn-success">
                                    <span class="fa fa-edit"></span></a>
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')"
                                    href="delete.php?id=<?php echo $isi['nim']; ?>" class="btn btn-danger"><span
                                        class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php
                        $a++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>