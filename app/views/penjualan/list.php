<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjualan</title>
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

        th {
            background-color: #007bff;
            color: white;
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

        button.edit {
            background-color: #ffc107;
        }

        button.edit:hover {
            background-color: #e0a800;
        }

        button.delete {
            background-color: #dc3545;
            color: white;
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
    <h1>Daftar Penjualan</h1>
    <div class="nav-buttons">
        <a href="index.php?controller=pelanggan" class="btn-nav purple">Pelanggan</a>
        <a href="index.php?controller=penjualan" class="btn-nav green">Penjualan</a>
        <a href="index.php?controller=produk" class="btn-nav orange">Produk</a>
    </div>
    <a href="index.php?controller=penjualan&page=tambah"><button>Tambah Penjualan</button></a>
    <table>
        <tr>
            <th>ID Penjualan</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $value): ?>
        <tr>
            <td><?= $value['penjualanid'] ?></td>
            <td><?= $value['tanggalpenjualan'] ?></td>
            <td><?= number_format($value['totalharga'], 0, ',', '.') ?></td>
            <td>
                <a href="index.php?controller=penjualan&page=detail&id=<?=$value['pelangganid']?>"><button class="detail">Detail</button></a>
                <a href="index.php?controller=penjualan&page=edit&id=<?=$value['pelangganid']?>"><button class="edit">Edit</button></a>
                <a href="index.php?controller=penjualan&page=delete&id=<?= $value['penjualanid'] ?>" onclick="return confirm('Yakin ingin menghapus penjualan ini?')">
                    <button class="delete">Hapus</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
