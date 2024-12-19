<?php
// Include database connection
require_once 'db.php';

// Create Product
function createProduct($nama, $pcs, $harga, $deskripsi, $gambar = null)
{
    global $conn;


    $upload_dir = '../uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    //image upload
    $image_path = '';
    if ($gambar && $gambar['error'] == 0) {
        $file_ext = strtolower(pathinfo($gambar['name'], PATHINFO_EXTENSION));
        $unique_name = uniqid() . '.' . $file_ext;
        $target_path = $upload_dir . $unique_name;

        // Move uploaded file
        if (move_uploaded_file($gambar['tmp_name'], $target_path)) {
            $image_path = 'uploads/' . $unique_name;
        }
    }

    // input data
    $nama = mysqli_real_escape_string($conn, $nama);
    $pcs = intval($pcs);
    $harga = floatval($harga);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);

    // Prepare SQL
    $query = "INSERT INTO produk (nama, pcs, harga, deskripsi, gambar) 
              VALUES ('$nama', $pcs, $harga, '$deskripsi', '$image_path')";

    return mysqli_query($conn, $query);
}

// tampil produk/read
function getProducts()
{
    global $conn;
    $query = "SELECT * FROM produk ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Gget id
function getProductById($id)
{
    global $conn;
    $id = intval($id);
    $query = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// Update
function updateProduct($id, $nama, $pcs, $harga, $deskripsi, $gambar = null)
{
    global $conn;


    $id = intval($id);
    $nama = mysqli_real_escape_string($conn, $nama);
    $pcs = intval($pcs);
    $harga = floatval($harga);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);

    // image
    $image_update_sql = '';
    if ($gambar && $gambar['error'] == 0) {
        $upload_dir = '../uploads/';
        $file_ext = strtolower(pathinfo($gambar['name'], PATHINFO_EXTENSION));
        $unique_name = uniqid() . '.' . $file_ext;
        $target_path = $upload_dir . $unique_name;

        if (move_uploaded_file($gambar['tmp_name'], $target_path)) {
            $image_path = 'uploads/' . $unique_name;
            $image_update_sql = ", gambar = '$image_path'";
        }
    }

    // 
    $query = "UPDATE produk 
              SET nama = '$nama', 
                  pcs = $pcs, 
                  harga = $harga, 
                  deskripsi = '$deskripsi'
                  $image_update_sql
              WHERE id = $id";

    return mysqli_query($conn, $query);
}

// Delete Product
function deleteProduct($id)
{
    global $conn;

    // Get product to delete associated image
    $product = getProductById($id);

    // Delete image file if exists
    if (!empty($product['gambar'])) {
        $image_path = '../' . $product['gambar'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // Delete product from database
    $id = intval($id);
    $query = "DELETE FROM produk WHERE id = $id";
    return mysqli_query($conn, $query);
}
