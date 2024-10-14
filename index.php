<?php
include "koneksi.php";

$sql = mysqli_query($koneksi, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Barang</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body class="bg-gray-100">
    <div id="app" class="container mx-auto mt-10 p-5">
        <h2 class="text-3xl font-bold mb-5">Data Barang</h2>

        <div class="mb-5">
            <a href="add.php" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Barang</a>
        </div>

        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-4 py-2">ID Barang</th>
                    <th class="px-4 py-2">Nama Barang</th>
                    <th class="px-4 py-2">Stok</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($sql->num_rows > 0): ?>
                    <?php while ($row = $sql->fetch_assoc()): ?>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="border px-4 py-2"><?= $row['id_brg'] ?></td>
                        <td class="border px-4 py-2"><?= $row['nama_brg'] ?></td>
                        <td class="border px-4 py-2"><?= $row['stok'] ?></td>
                        <td class="border px-4 py-2">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                        <td class="border px-4 py-2 text-center">
                            <a href="edit.php?id=<?= $row['id_brg'] ?>" class="bg-green-500 text-white px-3 py-1 rounded">Edit</a>
                            <a href="delete.php?id=<?= $row['id_brg'] ?>" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center p-5">Tidak Ada Data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                // Data untuk interaktivitas jika diperlukan
            }
        });
    </script>
</body>
</html>

<?php $koneksi->close(); ?>
