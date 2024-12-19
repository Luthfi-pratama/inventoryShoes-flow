<?php
require_once '../function/crud.php';

// Check ID
if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

$id = intval($_GET['id']);
$product = getProductById($id);

// jika produk not found,redirecgt
if (!$product) {
    header('Location: dashboard.php');
    exit();
}

// handle request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $pcs = $_POST['pcs'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Cek gambar
    $gambar = isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0 ? $_FILES['gambar'] : null;

    if (updateProduct($id, $nama, $pcs, $harga, $deskripsi, $gambar)) {
        header('Location: dashboard.php?success=2');
        exit();
    } else {
        $error_message = "Failed to update product";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Product</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Sepatu</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?php echo htmlspecialchars($product['nama']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="pcs" class="form-label">Jumlah (Pcs)</label>
                                <input type="number" class="form-control" id="pcs" name="pcs"
                                    value="<?php echo intval($product['pcs']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    value="<?php echo floatval($product['harga']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>
<?php echo htmlspecialchars($product['deskripsi']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">

                                <?php if (!empty($product['gambar'])): ?>
                                    <div class="mt-2">
                                        <p>Gambar Saat Ini:</p>
                                        <img src="../<?php echo htmlspecialchars($product['gambar']); ?>"
                                            alt="Current Product Image"
                                            style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="dashboard.php" class="btn btn-secondary me-md-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>