<?php
include('../function/crud.php');

// Fetch products
$products = getProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <style>
        .product-image {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .form-buttons {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <h4 class="sidebar-heading p-3">Admin Dashboard</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="../index.php">
                                Home
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="d-flex justify-content-end pt-3">
                        <a href="../index.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>

                <!-- Dashboard Summary Cards -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Produk</h5>
                                <p class="card-text"><?php echo count($products); ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Other summary cards remain the same -->
                </div>

                <!-- Product Addition Form -->
                <div class="col-md-8 col-md-offset-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>Tambahkan Produk</h1>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="product_add.php" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label>Nama Sepatu</label>
                                    <input class="form-control" name="nama" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label>Pcs</label>
                                    <input class="form-control" name="pcs" type="number" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label>Harga</label>
                                    <input class="form-control" name="harga" type="number" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Gambar</label>
                                    <input class="form-control" type="file" name="gambar" accept="image/*" />
                                </div>
                                <div class="form-buttons">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="fa fa-file-text"></i> Bersih
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Product List Table -->
                <div class="col-md-12 mt-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="alert alert-dark">
                                <h1 class="text-center">List Produk</h1>
                            </div>
                        </div>
                        <div class="data-tables datatable-dark">
                            <table class="table table-striped table-bordered table-hover" id="productTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Sepatu</th>
                                        <th>Pcs</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sequential_number = 1;
                                    foreach ($products as $product): ?>
                                        <tr>
                                            <td><?php echo $sequential_number++; ?></td>
                                            <td><?php echo $product['nama']; ?></td>
                                            <td><?php echo $product['pcs']; ?></td>
                                            <td>Rp. <?php echo number_format($product['harga']); ?></td>
                                            <td><?php echo $product['deskripsi']; ?></td>
                                            <td>
                                                <?php if (!empty($product['gambar'])): ?>
                                                    <img src="../<?php echo $product['gambar']; ?>" class="product-image"
                                                        alt="Product Image">
                                                <?php else: ?>
                                                    No Image
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="product_edit.php?id=<?php echo $product['id']; ?>"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                <a href="product_delete.php?id=<?php echo $product['id']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Print Button -->
                            <div class="text-end mt-3">
                                <a href="export.php" class="btn btn-success">
                                    <i class="fa fa-download"></i> Export (Print)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable for pagination, search, and sorting
            $('#productTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true
            });
        });
    </script>
</body>

</html>