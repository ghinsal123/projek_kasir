<?php
// print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pelanggan</title>
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

        form {
            background: white;
            padding: 20px;
            width: 50%;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input, textarea {
            width: calc(100% - 20px);
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 80px;
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
    <h1>Ubah Data Pelanggan</h1>
    <form action="index.php?page=update" method="POST" enctype="multipart/form-data">
        <label for="txtid">ID Pelanggan</label>
        <input type="text" id="txtid" name="txtid" value="<?= $data["pelangganid"] ?>" readonly>

        <label for="txtnama">Nama Pelanggan</label>
        <input type="text" id="txtnama" name="txtnama" value="<?= $data["namapelanggan"] ?>" required>

        <label for="txtno">No Telepon</label>
        <input type="text" id="txtno" name="txtno" value="<?= $data["nomortelepon"] ?>" required>

        <label for="filefoto">Foto</label>
        <input type="file" id="filefoto" name="filefoto">
        <input type="hidden" name="fotolama" value="<?= $data['foto'] ?>">

        <label for="txtalamat">Alamat</label>
        <textarea id="txtalamat" name="txtalamat" rows="5" cols="30"><?= $data["alamat"] ?></textarea>

        <div class="button-container">
            <a href="index.php">Kembali</a>
            <button type="submit" name="btnupdate">Update</button>
        </div>
    </form>
</body>
</html>
