<?php
require_once '../function/crud.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $pcs = $_POST['pcs'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = isset($_FILES['gambar']) ? $_FILES['gambar'] : null;

    if (createProduct($nama, $pcs, $harga, $deskripsi, $gambar)) {
        header('Location: dashboard.php?success=1');
    } else {
        header('Location: dashboard.php?error=1');
    }
    exit();
} else {
    header('Location: dashboard.php');
    exit();
}
