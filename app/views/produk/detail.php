<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .container {
            background: white;
            padding: 20px;
            width: 50%;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        img {
            display: block;
            margin: 0 auto 15px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Detail Produk</h1>
    <div class="container">
        <td><img src="uploads/<?= $data['foto'] ?>" alt="Foto" width="50" height="50"></td>
        <p><strong>ID Produk: <?= $data ["produkid"]?></strong></p>
        <p><strong>Nama Produk:<?= $data ["namaproduk"]?></strong></p>
        <p><strong>Harga:<?= $data ["harga"]?></strong></p>
        <p><strong>Stok:<?= $data ["stok"]?></strong> </p>
        <div class="button-container">
            <a href="index.php?controller=produk">Kembali</a>
        </div>
    </div>
</body>
</html>
