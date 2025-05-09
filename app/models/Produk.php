<?php 
require_once "../config/Database.php";

class Produk{
    private $db;
    private $tabel = "produk";

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->hubungkan();
    }
    //method untuk memanggil semua data produk di db
    public function panggilProduk(){
        $query = "SELECT * FROM $this->tabel";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //method untuk memanggil semua data produk di db
    public function panggilKhusus($id){
        $query = "SELECT * FROM $this->tabel WHERE produkid=$id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //method untuk menghapus data produk
    public function hapus($id){
        $query = "DELETE FROM $this->tabel WHERE produkid = $id";
        $stmt = $this->db->prepare($query);//memepersiapkan statment query
        $result = $stmt->execute();//jalankan perintah
        return $result;//menjalankan sql
    }

    //method untuk menyimpan data produk 
    public function simpanData($data){//$data -> parameter untuk menyimpan isi data yang kita ketik di form tambah data
        $query = "INSERT INTO $this->tabel VALUES(
            :id, :nama, :harga, :stok, :foto)";//bind parameter untuk mencegah injeksi data 
        $stmt = $this->db->prepare($query);//mempersiapkan statment query
        $result = $stmt->execute($data);//karena ada data yang perlu diinput maka ditambahin parameter $data, $data akan dipakai di form tambah data pelanggan
        return $result;//menjalankan data sqlnya
    }

    //method untuk mengupdate data pelanggan
    public function updateProduk($data){
        $query = "UPDATE produk 
                  SET namaproduk = :nama, harga = :harga, stok = :stok, foto = :foto
                  WHERE produkid = :id";
    
        $stmt = $this->db->prepare($query); // Mempersiapkan statement
        $result = $stmt->execute($data);
        return $result;
    }   
}
?>