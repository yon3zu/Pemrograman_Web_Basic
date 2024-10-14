<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_brg = $_POST['nama_brg'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $insert = mysqli_query($koneksi, "INSERT INTO barang (nama_brg, stok, harga) VALUES ('$nama_brg', '$stok', '$harga')");
    if ($insert) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body class="bg-gray-100">
    <div id="app" class="container mx-auto mt-10 p-5">
        <h2 class="text-3xl font-bold mb-5">Tambah Barang</h2>

        <form method="POST" @submit.prevent="validateForm" class="bg-white shadow-md rounded p-5">
            <div class="mb-4">
                <label class="block text-gray-700">Nama Barang:</label>
                <input type="text" name="nama_brg" v-model="nama_brg" class="w-full px-4 py-2 border rounded" required>
                <span v-if="errors.nama_brg" class="text-red-500">{{ errors.nama_brg }}</span>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Stok:</label>
                <input type="number" name="stok" v-model="stok" class="w-full px-4 py-2 border rounded" required>
                <span v-if="errors.stok" class="text-red-500">{{ errors.stok }}</span>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Harga:</label>
                <input type="number" name="harga" v-model="harga" class="w-full px-4 py-2 border rounded" required>
                <span v-if="errors.harga" class="text-red-500">{{ errors.harga }}</span>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
            <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
        </form>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                nama_brg: '',
                stok: '',
                harga: '',
                errors: {}
            },
            methods: {
                validateForm() {
                    this.errors = {};
                    let isValid = true;

                    if (!this.nama_brg) {
                        this.errors.nama_brg = 'Nama barang tidak boleh kosong';
                        isValid = false;
                    }
                    if (!this.stok || this.stok <= 0) {
                        this.errors.stok = 'Stok harus lebih dari 0';
                        isValid = false;
                    }
                    if (!this.harga || this.harga <= 0) {
                        this.errors.harga = 'Harga harus lebih dari 0';
                        isValid = false;
                    }

                    if (isValid) {
                        // Submit the form
                        this.$el.querySelector('form').submit();
                    }
                }
            }
        });
    </script>
</body>
</html>
