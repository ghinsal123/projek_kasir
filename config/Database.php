<?php
class Database{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $namadb = "27rplb_14";
    private $koneksi;

    public function hubungkan(){
        //$objek = new class();
        $this->koneksi = new PDO ("mysql:host={$this->host};
                                    dbname={$this->namadb}",
                                    $this->user,
                                    $this->pass
                                );

        $this->koneksi->setAttribute(PDO::ATTR_ERRMODE,
                                    PDO::ERRMODE_EXCEPTION);
                                    
        return $this->koneksi;
    }
}
?>