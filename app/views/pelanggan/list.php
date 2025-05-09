<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        a button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        /* Single blue header color */
        th {
            background-color: #007bff;
            color: white;
        }

        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        /* Custom colors for buttons */
        button.edit {
            background-color: #ffc107;
        }

        button.edit:hover {
            background-color: #e0a800;
        }

        button.delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        button.delete:hover {
            background-color: #c82333;
        }

        button.detail {
            background-color: #17a2b8;
        }

        button.detail:hover {
            background-color: #138496;
        }
        .nav-buttons {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .btn-nav {
            padding: 8px 16px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 8px;
            display: inline-block;
            font-weight: bold;
        }

        .btn-nav.purple { background-color:rgb(219, 52, 138); }
        .btn-nav.green { background-color: #2ecc71; }
        .btn-nav.orange { background-color: #e67e22; }

        .btn-nav:hover {
            opacity: 0.9;
        }

    </style>
</head>
<body>
    <h1>Daftar Pelanggan</h1>
    <div class="nav-buttons">
        <a href="index.php?controller=pelanggan" class="btn-nav purple">Pelanggan</a>
        <a href="index.php?controller=penjualan" class="btn-nav green">Penjualan</a>
        <a href="index.php?controller=produk" class="btn-nav orange">Produk</a>
    </div>
    <a href="index.php?page=tambah"><button>Tambah Pelanggan</button></a><!--berpindah halaman ke form tambah pelanggan dengan url parameter-->
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No Telepon</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <?php 
                //print_r($data);
                foreach($data as $value)://melakukan mencetak demensi 1 dan perulangan untuk data dari database berupa array ($data itu demensi 1) ($value itu demensi 2)
            ?>
            <td><?php echo $value['pelangganid']; //mencetak dimensi 2 yang isinya pelangganid pada tabel pelanggan?></td>
            <td><?php echo $value['namapelanggan']//mencetak dimensi 2 yang isinya namapelanggan pada tabel pelanggan?></td>
            <td><?= $value['nomortelepon'] //mencetak dimensi 2 dengan terneri bukan echo yang isinya nomortelepon?></td>
            <td><img src="uploads/<?= $value['foto'] ?>" alt="Foto Pelanggan" style="width: 50px; height: 50px; border-radius: 50%;"></td>
            <td>
                <a href="index.php?page=detail&id=<?=$value['pelangganid']?>"><button class="detail">Detail</button></a>
                <a href="index.php?page=edit&id=<?=$value['pelangganid']?>"><button class="edit">Edit</button></a>
                <a href="index.php?page=delete&id=<?= $value['pelangganid']?>" 
                    onclick="return confirm('Yakin ingin mengahpus pelanggan ini?')">
                    <button class="delete">Hapus</button>
                </a>
            </td>
        </tr>
        <?php endforeach; //penutup foreach?>
    </table>
</body>
</html>
