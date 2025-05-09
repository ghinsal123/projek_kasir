<?php
include "../app/models/Pelanggan.php";

class PelangganController {
    private $model;

    public function __construct() {
        $this->model = new Pelanggan();
    }

    public function pelanggan() {
        $data = $this->model->panggilSemua();
        include "../app/views/pelanggan/list.php";
    }

    public function detail($param) {
        $data = $this->model->panggilKhusus($param);
        include "../app/views/pelanggan/detail.php";
    }

    public function delete($param) {
        $this->model->hapus($param);
        $this->pelanggan();
    }

    public function tambah() {
        include "../app/views/pelanggan/tambah.php";
    }

    public function simpan() {
        $gambar = null;// default null isinya kosong. Jika tidak ada file yang diinput maka masuk ke variabel $gambar yang dimana variabel $gambar itu kosong

        // isset itu untuk memeriksa apakah variabel $gambar sudah di-set dan tidak bernilai kosong 
        if (isset($_FILES['filefoto']) && $_FILES['filefoto']['error'] === 0) {// Jika variabel $_FILES berisi filefoto dan variabel $_FILES beirisi filefoto yang rusak maka error dan kembali ke 0, jika sudah benar isinya maka akan bernilai 1

            $typediizinkan = ['png','jpg','jpeg'];//di dalam variabel $typediizinkan untuk tipe atau extension file yang bisa ditambah 
            $extfile = strtolower(pathinfo($_FILES['filefoto']['name'],PATHINFO_EXTENSION));//strtolower untuk mengecilkan string, pathinfo untuk mengambil informasi dari nama file nya
            $extvalid = in_array($extfile, $typediizinkan);// ibarat mencari jarum di dalam jerami, variabel $extvalid memvalidasi file yang diperbolehkan sesuai ketentuan
            if(!$extvalid){//jika validasi tidak sesuai maka akan
                die("tipe file tidak bisa digunakan");//memberi tahu bahwa tipe file tidak sesuai ketentuan
            }

            $ukurandiizinkan = 1024 * 100;//ukuran yang diizinkan adalah 100kb
            $ukuranfile = $_FILES['filefoto']['size'];//
            if($ukuranfile > $ukurandiizinkan){//jika ukuran file lebih besar dari ukuran yang udah ditentukan atau sudah diizinkan maka akan 
                die("ukuran file terlalu besar, max 100kb");//memberi tahu bahwa tipe file tidak sesuai ketentuan
            }

            $targetDir = "uploads/";// folder yang mau disimpan fotonya
            //08-05-2025-09-01-45_ghina.jpg
            $gambar = date("d-m-Y-H-i-s") . '_' . basename($_FILES['filefoto']['name']);//memanggil nama file yang mau disimpan contohnya date("d-m-Y-H-i-s") itu mendefinisikan tgl,bln,thn,jam,nmenit,detik jadi seperti ini 08-05-2025-09-01-45 kemudian '_' itu untuk mendefinisikan andeskor dan terakhir ada basename($_FILES['filefoto']['name'] itu unutk mendefinisikan nama file yang diinginkan
            //upload/08-05-2025-09-01-45_ghina.jpg
            $targetFile = $targetDir . $gambar;// variabel untuk menyimpan variabel yang sudah didefinisikan $targetDir folder yang menyimpan fotonya dan variabel $gambar itu untuk nama file nya

            //Simpan File
            move_uploaded_file($_FILES['filefoto']['tmp_name'], $targetFile);//memanggil filenya yang mau disimpan. 2 parameter 
        }

        $data = [
            'id' => $_POST['txtid'],
            'nama' => $_POST['txtnama'],
            'alamat' => $_POST['txtalamat'],
            'notelp' => $_POST['txtno'],
            'foto' => $gambar
        ];

        $this->model->simpanData($data);
        $this->pelanggan();
    }

    public function edit($id) {
        $data = $this->model->panggilKhusus($id);
        include "../app/views/pelanggan/edit.php";
    }

    public function update() {
        $gambar = $_POST['fotolama'] ?? null;

        if (isset($_FILES['filefoto']) && $_FILES['filefoto']['error'] === 0) {
            $typediizinkan = ['png','jpg','jpeg'];//di dalam variabel $typediizinkan untuk tipe atau extension file yang bisa ditambah 
            $extfile = strtolower(pathinfo($_FILES['filefoto']['name'],PATHINFO_EXTENSION));//strtolower untuk mengecilkan string, pathinfo untuk mengambil informasi dari nama file nya
            $extvalid = in_array($extfile, $typediizinkan);// ibarat mencari jarum di dalam jerami, variabel $extvalid memvalidasi file yang diperbolehkan sesuai ketentuan
            if(!$extvalid){//jika validasi tidak sesuai maka akan
                die("tipe file tidak bisa digunakan");//memberi tahu bahwa tipe file tidak sesuai ketentuan
            }

            $targetDir = "uploads/";// folder yang mau disimpan fotonya
            //08-05-2025-09-01-45_ghina.jpg
            $gambar = date("d-m-Y-H-i-s") . '_' . basename($_FILES['filefoto']['name']);//memanggil nama file yang mau disimpan contohnya date("d-m-Y-H-i-s") itu mendefinisikan tgl,bln,thn,jam,nmenit,detik jadi seperti ini 08-05-2025-09-01-45 kemudian '_' itu untuk mendefinisikan andeskor dan terakhir ada basename($_FILES['filefoto']['name'] itu unutk mendefinisikan nama file yang diinginkan
            //upload/08-05-2025-09-01-45_ghina.jpg
            $targetFile = $targetDir . $gambar;// variabel untuk menyimpan variabel yang sudah didefinisikan $targetDir folder yang menyimpan fotonya dan variabel $gambar itu untuk nama file nya

            //Simpan File
            move_uploaded_file($_FILES['filefoto']['tmp_name'], $targetFile);//memanggil filenya yang mau disimpan. 2 parameter 
        }

        $data = [
            'id' => $_POST['txtid'],
            'nama' => $_POST['txtnama'],
            'alamat' => $_POST['txtalamat'],
            'notelp' => $_POST['txtno'],
            'foto' => $gambar
        ];

        $this->model->updatePelanggan($data);
        $this->pelanggan();
    }

    public function index() {
        $this->pelanggan();
    }
}
?>
