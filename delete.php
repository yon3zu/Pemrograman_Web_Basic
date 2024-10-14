<?php
include "koneksi.php";

$id = $_GET['id'];

$delete = mysqli_query($koneksi, "DELETE FROM barang WHERE id_brg = '$id'");

if ($delete) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data";
}
?>
