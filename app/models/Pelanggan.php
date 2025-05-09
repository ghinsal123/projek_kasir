<?php
require_once "../config/Database.php";

class Pelanggan{
    private $db;
    private $tabel = "pelanggan";

    //method otomatis membuat terhubung ke database
    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->hubungkan();
    }

    //method untuk memanggil semua data pelanggan di db
    public function panggilSemua(){
        $query = "SELECT * FROM $this->tabel"; //membuat perintah sql untuk manggil semua data
        $stmt = $this->db->prepare($query); //persiapan untuk menjalankan query yang telah disiapkan sebelumnya
        $stmt->execute(); //memanggil semua persiapan query
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //mengambil data tabel yang sudah dipersiapkan berupa array asosiatif 
        // $result = $stmt->fetchAll(PDO::FETCH_NUM); //mengambil data tabel yang sudah dipersiapkan berupa array asosiatif 
        // $result = $stmt->fetchAll(); //mengambil data tabel yang sudah dipersiapkan berupa array asosiatif 
        return $result; // mengembalikan semua hasil yang sudah dipersiapkan dan dipanggil sebagai output dari fungsi sebelumnya
    }

    //method untuk mengambil data pelanggan berdasarkan id tertentu
    public function panggilKhusus($id){
        $query = "SELECT * FROM $this->tabel WHERE pelangganid=$id";//query untuk mengambil satu pelanggan berdasarkan id
        $stmt = $this->db->prepare($query);//memepersiapkan statement sql
        $stmt->execute();//menjalankan query
        $result = $stmt->fetch(PDO::FETCH_ASSOC);//mengambil satu hasil sebagai array asosiatif
        return $result;//menjalankan sql
    }

    //method untuk menghapus data pelanggan
    public function hapus($id){
        $query = "DELETE FROM $this->tabel WHERE pelangganid = $id";
        $stmt = $this->db->prepare($query);//memepersiapkan statment query
        $result = $stmt->execute();//jalankan perintah
        return $result;//menjalankan sql
    }

    //method untuk menyimpan data pelanggan 
    public function simpanData($data){//$data -> parameter untuk menyimpan isi data yang kita ketik di form tambah data
        $query = "INSERT INTO $this->tabel VALUES(
            :id, :nama, :alamat, :notelp, :foto)";//bind parameter untuk mencegah injeksi data 
        $stmt = $this->db->prepare($query);//mempersiapkan statment query
        $result = $stmt->execute($data);//karena ada data yang perlu diinput maka ditambahin parameter $data, $data akan dipakai di form tambah data pelanggan
        return $result;//menjalankan data sqlnya
    }

    //method untuk mengupdate data pelanggan
    public function updatePelanggan($data){
        $query = "UPDATE pelanggan 
                  SET namapelanggan = :nama, alamat = :alamat, nomortelepon = :notelp, foto = :foto
                  WHERE pelangganid = :id";
    
        $stmt = $this->db->prepare($query); // Mempersiapkan statement
        $result = $stmt->execute($data);
        
        return $result;
    }
}
?>