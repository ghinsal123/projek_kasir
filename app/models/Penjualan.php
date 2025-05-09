<?php 
require_once "../config/Database.php";

class Penjualan {
    private $db;
    private $tabel = "penjualan";

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->hubungkan();
    }

    // Memanggil semua data penjualan
    public function panggilPenjualan(){
        $query = "SELECT * FROM $this->tabel";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Memanggil data penjualan tertentu berdasarkan ID
    public function panggilKhusus($id){
        $query = "SELECT * FROM $this->tabel WHERE penjualanid = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menghapus data penjualan
    public function hapus($id){
        $query = "DELETE FROM $this->tabel WHERE penjualanid = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Menyimpan data penjualan
    public function simpanData($data){
        $query = "INSERT INTO $this->tabel (penjualanid, tanggalpenjualan, totalharga, pelangganid)
                  VALUES (:id, :tanggal, :total, :pelangganid)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }

    // Mengupdate data penjualan
    public function updatePenjualan($data){
        $query = "UPDATE $this->tabel 
                  SET tanggalpenjualan = :tanggal, totalharga = :total, pelangganid = :pelangganid
                  WHERE penjualanid = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }
}
?>
