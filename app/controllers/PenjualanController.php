<?php
include "../app/models/Penjualan.php";

class PenjualanController {
    private $model;

    public function __construct(){
        $this->model = new Penjualan();
    }

    // Menampilkan daftar penjualan
    public function penjualan(){
        $data = $this->model->panggilPenjualan();
        include "../app/views/penjualan/list.php";
    }

    // Menampilkan detail penjualan
    public function detail($id){
        $data = $this->model->panggilKhusus($id);
        include "../app/views/penjualan/detail.php";
    }

    // Menghapus data penjualan
    public function delete($id){
        $this->model->hapus($id);
        $this->penjualan(); // kembali ke list setelah hapus
    }

    // Tampilkan form tambah
    public function tambah(){
        include "../app/views/penjualan/tambah.php";
    }

    // Simpan data baru dari form tambah
    public function simpan(){
        $data = [
            'id' => $_POST['jual_id'],
            'tanggal' => $_POST['jual_tanggal'],
            'total' => $_POST['jual_total'],
            'pelangganid' => $_POST['jual_pelangganid']
        ];
        $this->model->simpanData($data);
        $this->penjualan(); // kembali ke list
    }

    // Tampilkan form edit
    public function edit($id){
        $data = $this->model->panggilKhusus($id);
        include "../app/views/penjualan/edit.php";
    }

    // Simpan hasil update
    public function update(){
        $data = [
            'id' => $_POST['jual_id'],
            'tanggal' => $_POST['jual_tanggal'],
            'total' => $_POST['jual_total'],
            'pelangganid' => $_POST['jual_pelangganid']
        ];
        $this->model->updatePenjualan($data);
        $this->penjualan(); // kembali ke list
    }
    
    public function index() {
        $this->penjualan(); // halaman list penjualan
    }
    
}
?>
