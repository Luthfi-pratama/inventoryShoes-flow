<?php
include 'function/db.php';


$query = "SELECT * FROM produk ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Toko Sepatu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
        .nav-item a {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .nav-item a:hover {
            transform: scale(1.1);
            background-color: #007bf6;
        }

        .offcanvas-header .btn-close {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .offcanvas-header .btn-close:hover {
            transform: rotate(90deg);
            background-color: #a30817;
        }

        .sidebar {
            border: 2px solid #007bf6;
            border-radius: 5px;
            padding: 10px;
        }

        .dropdown-menu {
            border: 2px solid #007bf6;
            border-radius: 5px;
            padding: 10px;
        }

        .dropdown-item:hover {
            background-color: #007bf6;
            color: #fff;
        }

        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        body {
            position: relative;
            min-height: 100vh;
            padding-bottom: 50px;
            /* Height of the footer */
            box-sizing: border-box;
        }

        .card {
            width: 100%;
            height: 400px;
            padding: 0.8em;
            background: #ffffff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border-radius: 10px;
        }

        .card-img {
            height: 200px;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover .card-img img {
            transform: scale(1.05);
        }

        .card-info {
            padding-top: 15px;
        }

        svg {
            width: 20px;
            height: 20px;
        }

        .card-footer {
            position: absolute;
            bottom: 0.8em;
            left: 0.8em;
            right: 0.8em;
            padding-top: 10px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /*Text*/
        .text-title {
            font-weight: 600;
            font-size: 1.1em;
            line-height: 1.3;
            margin-bottom: 8px;
            color: #333;
        }

        .text-body {
            font-size: 0.9em;
            color: #666;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .price {
            font-weight: bold;
            color: #007bff;
            font-size: 1.2em;
        }

        .stock {
            font-size: 0.9em;
            color: #28a745;
        }

        /*Button*/


        .card-button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="#"><i class="bi bi-shop"></i> ShoeStore</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-person-circle"></i>
                            User
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li>
                                <a class="dropdown-item" href="rofile.php"><i class="bi bi-person"></i>
                                    Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="setting.php"><i class="bi bi-gear"></i>
                                    Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="app/dashboard.php"><i class="bi bi-box"></i>
                                    Dashboard</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar-->
    <div class="container-lg">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <nav class="navbar navbar-expand-lg bg-light rounded mt-3 sidebar">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel" style="width: 250px">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                                    Menu
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav flex-column justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php"><i
                                                class="bi bi-house-door"></i> Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="product.php"><i class="bi bi-bag-check"></i>
                                            Product</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="order.php"><i class="bi bi-cart4"></i> Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="coment.php"><i class="bi bi-chat-dots"></i> Ulasan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="kategori.php"><i class="bi bi-tag"></i> Kategori</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!--akhir sidebar-->

            <!-- Main Content -->
            <div class="col-lg-9 ms-auto mt-2">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col">
                                <div class="card">
                                    <div class="card-img">
                                        <?php if (!empty($row['gambar']) && file_exists($row['gambar'])): ?>
                                            <img src="<?php echo htmlspecialchars($row['gambar']); ?>"
                                                alt="<?php echo htmlspecialchars($row['nama']); ?>">
                                        <?php else: ?>
                                            <img src="app/uploads/default-product.jpg" alt="Default Product Image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="text-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
                                        <p class="text-body"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                                        <div class="stock">
                                            Stock: <?php echo htmlspecialchars($row['pcs']); ?> pcs
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <span class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
                                        <button class="card-button">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<div class="col-12 text-center">';
                        echo '<p class="alert alert-info">No products available at the moment.</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <!-- Footer content -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>