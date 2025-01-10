<?php
$host = "localhost";
$user = "root";
$pass = "1234";
$db = "barang";

$koneksi = new DB($host, $user, $pass, $db);

class DB
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $pdo;
    
    public function __construct($host, $user, $pass, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db;

            $this->pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            ]);
            echo "Koneksi Berhasil Jir";
        } catch (PDOException $e) {
            echo "Koneksi Gagal Bangsat!!" . $e->getMessage() . "<br>";
        }
    }
    public function insert($nama_barang, $stok, $harga_barang, $tgl_masuk) {
        try {
            $sql = "INSERT INTO transaksi (nama_barang, stok, harga_barang, tgl_masuk) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nama_barang, $stok, $harga_barang, $tgl_masuk]);
            return true;
        } catch (PDOException $e) {
            echo "Error, Data tidak bisa disimpan: " . $e->getMessage() . "<br>";
            return false;
        }
    }
    public function update($id_barang, $nama_barang, $stok, $harga_barang, $tgl_masuk) {
        try {
            $sql = 'UPDATE transaksi SET nama_barang = ?, stok = ?, harga_barang = ?, tgl_masuk = ? WHERE id_barang = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nama_barang, $stok, $harga_barang, $tgl_masuk, $id_barang]);
        } catch (PDOException $e) {
            echo "Error, Data tidak bisa diperbarui: " . $e->getMessage();
        }
    }
    public function delete($id_barang) {
        try {
            $sql = 'DELETE FROM transaksi WHERE id_barang = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id_barang]);
        } catch (PDOException $e) {
            echo "Error, Data tidak bisa dihapus: " . $e->getMessage();
        }
    }
    public function query($sql)
    {
        try {
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Error, Data tidak bisa diambil: " . $e->getMessage() . "<br>";
        }
    }
    public function getById($id_barang) {
        try {
            $sql = "SELECT * FROM transaksi WHERE id_barang = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id_barang]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error, Data tidak bisa diambil: " . $e->getMessage() . "<br>";
            return false;
        }
    }
}
?>
