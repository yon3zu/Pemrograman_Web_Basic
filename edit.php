<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_brg = '$id'");
$row = mysqli_fetch_assoc($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_brg = $_POST['nama_brg'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $update = mysqli_query($koneksi, "UPDATE barang SET nama_brg = '$nama_brg', stok = '$stok', harga = '$harga' WHERE id_brg = '$id'");
    if ($update) {
        header("Location: index.php");
    } else {
        echo "Gagal update data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5">
        <h2 class="text-3xl font-bold mb-5">Edit Barang</h2>

        <form method="POST" class="bg-white shadow-md rounded p-5">
            <div class="mb-4">
                <label class="block text-gray-700">Nama Barang:</label>
                <input type="text" name="nama_brg" value="<?= $row['nama_brg'] ?>" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Stok:</label>
                <input type="number" name="stok" value="<?= $row['stok'] ?>" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Harga:</label>
                <input type="number" name="harga" value="<?= $row['harga'] ?>" class="w-full px-4 py-2 border rounded" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
        </form>
    </div>
</body>
</html>
