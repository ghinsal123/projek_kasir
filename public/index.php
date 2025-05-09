<?php
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'pelanggan';

switch ($controllerName) {
    case 'produk':
        include "../app/controllers/ProdukController.php";
        $controller = new ProdukController();
        break;

    case 'penjualan':
        include "../app/controllers/PenjualanController.php";
        $controller = new PenjualanController();
        break;

    case 'pelanggan':
    default:
        include "../app/controllers/PelangganController.php";
        $controller = new PelangganController();
        break;
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    if ($page == 'detail' && isset($_GET['id'])) {
        $controller->detail($_GET['id']);
    } elseif ($page == 'delete' && isset($_GET['id'])) {
        $controller->delete($_GET['id']);
    } elseif ($page == 'tambah') {
        $controller->tambah();
    } elseif ($page == 'simpan' && isset($_POST['btnsimpan'])) {
        $controller->simpan();
    } elseif ($page == 'edit' && isset($_GET['id'])) {
        $controller->edit($_GET['id']);
    } elseif ($page == 'update' && isset($_POST['btnupdate'])) {
        $controller->update();
    } else {
        // fallback kalau page nggak cocok
        $controller->index(); 
    }
} else {
    $controller->index(); // default halaman list
}
?>
