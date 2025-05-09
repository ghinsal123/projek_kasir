<?php
include "../app/models/Produk.php";
class ProdukController{
    private $model;

    public function __construct(){
        $this->model = new Produk();
    }

    public function produk(){
        $data = $this->model->panggilProduk();
        include "../app/views/produk/list.php";
    }

    //Method untuk menampilkan detail data berdasarkan parameter yang diberikan
    public function detail($param){
        $data = $this->model->panggilKhusus($param);//memanggil method 'panggilKhusus' dari model dan menyimpan hasilnya ke dalam variabel $data
        include "../app/views/produk/detail.php";//membuat tampilan detail produk dengan menyertakan file view yang sesuai
    }

    //Method untuk menghapus list data produk
    public function delete($param){
        $run = $this->model->hapus($param);
        $this->produk();//memanggil method produk untuk kembali lagi ke halaman list setelah di hapus salah satu listnya
    }

    //Method untuk membuka form tambah data produk
    public function tambah(){
        include "../app/views/produk/tambah.php";//alamat untuk menampilkan form tambah
    } 

    //Method untuk memproses inputan yang mau disimpan
    public function simpan(){
        $gambar = null;

        if(isset($_FILES['prod_foto']) && $_FILES['prod_foto']['error'] === 0){
            $typediizinkan = ['png','jpg','jpeg'];//di dalam variabel $typediizinkan untuk tipe atau extension file yang bisa ditambah 
            $extfile = strtolower(pathinfo($_FILES['prod_foto']['name'],PATHINFO_EXTENSION));//strtolower untuk mengecilkan string, pathinfo untuk mengambil informasi dari nama file nya
            $extvalid = in_array($extfile, $typediizinkan);// ibarat mencari jarum di dalam jerami, variabel $extvalid memvalidasi file yang diperbolehkan sesuai ketentuan
            if(!$extvalid){//jika validasi tidak sesuai maka akan
                die("tipe file tidak bisa digunakan");//memberi tahu bahwa tipe file tidak sesuai ketentuan
            }

            $ukurandiizinkan = 1024 * 100;//ukuran yang diizinkan adalah 100kb
            $ukuranfile = $_FILES['prod_foto']['size'];//
            if($ukuranfile > $ukurandiizinkan){//jika ukuran file lebih besar dari ukuran yang udah ditentukan atau sudah diizinkan maka akan 
                die("ukuran file terlalu besar, max 100kb");//memberi tahu bahwa tipe file tidak sesuai ketentuan
            }

            $targetDir = "uploads/";// folder yang mau disimpan fotonya
            //08-05-2025-09-01-45_ghina.jpg
            $gambar = date("d-m-Y-H-i-s") . '_' . basename($_FILES['prod_foto']['name']);//memanggil nama file yang mau disimpan contohnya date("d-m-Y-H-i-s") itu mendefinisikan tgl,bln,thn,jam,nmenit,detik jadi seperti ini 08-05-2025-09-01-45 kemudian '_' itu untuk mendefinisikan andeskor dan terakhir ada basename($_FILES['filefoto']['name'] itu unutk mendefinisikan nama file yang diinginkan
            //upload/08-05-2025-09-01-45_ghina.jpg
            $targetFile = $targetDir . $gambar;// variabel untuk menyimpan variabel yang sudah didefinisikan $targetDir folder yang menyimpan fotonya dan variabel $gambar itu untuk nama file nya

            //Simpan File
            move_uploaded_file($_FILES['prod_foto']['tmp_name'], $targetFile);//memanggil filenya yang mau disimpan. 2 parameter 
        }

        $data = [//variabel untuk mengisi inputan dari form tambah berupa array asosiatif terdiri 4 elemen
            'id' => $_POST['prod_id'],//id adalah atribut yang ada di database table pelanggan, mengisinya melalui metode POST dan txtid itu name yang ada di input form tambahnya
            'nama' => $_POST['prod_nama'],//nama adalah atribut yang ada di database table pelanggan, mengisinya melalui metode POST dan txtnama itu name yang ada di input form tambahnya
            'harga' => $_POST['prod_harga'],//harga adalah atribut yang ada di database table pelanggan, mengisinya melalui metode POST dan txtharga itu name yang ada di input form tambahnya
            'stok' => $_POST['prod_stok'],//stok adalah atribut yang ada di database table pelanggan, mengisinya melalui metode POST dan txtstok itu name yang ada di input form tambahnya
            'foto' => $gambar
        ];
        $run = $this->model->simpanData($data);//menjalankan variabel data
        $this->produk();//balik ke halaman list setelah berhasil menambahkan data
    }

    public function edit($id){
        $data = $this->model->panggilKhusus($id);
        include "../app/views/produk/edit.php";
    }
    
    //Method untuk memproses inputan yang mau diupdate
    public function update() {
        $gambar = $_POST['fotolama'] ?? null;

        if(isset($_FILES['prod_foto']) && $_FILES['prod_foto']['error'] === 0){
            $typediizinkan = ['png','jpg','jpeg'];//di dalam variabel $typediizinkan untuk tipe atau extension file yang bisa ditambah 
            $extfile = strtolower(pathinfo($_FILES['prod_foto']['name'],PATHINFO_EXTENSION));//strtolower untuk mengecilkan string, pathinfo untuk mengambil informasi dari nama file nya
            $extvalid = in_array($extfile, $typediizinkan);// ibarat mencari jarum di dalam jerami, variabel $extvalid memvalidasi file yang diperbolehkan sesuai ketentuan
            if(!$extvalid){//jika validasi tidak sesuai maka akan
                die("tipe file tidak bisa digunakan");//memberi tahu bahwa tipe file tidak sesuai ketentuan
            }
            
            $targetDir = "uploads/";// folder yang mau disimpan fotonya
            //08-05-2025-09-01-45_ghina.jpg
            $gambar = date("d-m-Y-H-i-s") . '_' . basename($_FILES['prod_foto']['name']);//memanggil nama file yang mau disimpan contohnya date("d-m-Y-H-i-s") itu mendefinisikan tgl,bln,thn,jam,nmenit,detik jadi seperti ini 08-05-2025-09-01-45 kemudian '_' itu untuk mendefinisikan andeskor dan terakhir ada basename($_FILES['filefoto']['name'] itu unutk mendefinisikan nama file yang diinginkan
            //upload/08-05-2025-09-01-45_ghina.jpg
            $targetFile = $targetDir . $gambar;// variabel untuk menyimpan variabel yang sudah didefinisikan $targetDir folder yang menyimpan fotonya dan variabel $gambar itu untuk nama file nya

            //Simpan File
            move_uploaded_file($_FILES['prod_foto']['tmp_name'], $targetFile);//memanggil filenya yang mau disimpan. 2 parameter 
        }

        $data = [
            'id' => $_POST['prod_id'],
            'nama' => $_POST['prod_nama'],
            'harga' => $_POST['prod_harga'] ?? 0,
            'stok' => $_POST['prod_stok'] ?? 0,
            'foto' => $gambar
            // bisa tambahkan penanganan file foto di sini kalau perlu
        ];
        $this->model->updateProduk($data); // pastikan method ini ada di model
        $this->produk(); // kembali ke halaman list setelah update
    }

    public function index() {
        $this->produk(); // halaman list produk
    }
    
}
?>