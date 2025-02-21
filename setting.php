<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings - Toko Sepatu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bf6;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border: 2px solid #007bf6;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bf6;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #005bb5;
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
                            <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person"></i> Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
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
                            aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav flex-column justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/index.php"><i class="bi bi-house-door"></i> Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/Product/product.php"><i class="bi bi-bag-check"></i>
                                            Product</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/Order/order.php"><i class="bi bi-cart4"></i>
                                            Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/Komentar/coment.php"><i class="bi bi-chat-dots"></i>
                                            Ulasan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!--akhir sidebar-->

            <!-- Main Content -->
            <div class="col-lg-9 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Settings</h5>
                        <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="account-tab" data-bs-toggle="tab" data-bs-target="#account"
                                    type="button" role="tab" aria-controls="account"
                                    aria-selected="false">Account</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="settingsTabContent">
                            <div class="tab-pane fade show active p-3" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <h6>Home Settings</h6>
                                <p>Content for Home settings.</p>
                            </div>
                            <div class="tab-pane fade p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h6>Profile Settings</h6>
                                <form>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Enter your username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="name@example.com">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            <div class="tab-pane fade p-3" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <h6>Account Settings</h6>
                                <form>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter your password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm-password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm-password"
                                            placeholder="Confirm your password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            <div class="tab-pane fade p-3" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <h6>Reviews Settings</h6>
                                <p>Content for Reviews settings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Main Content -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© 2024 Toko Sepatu. All rights reserved.</p>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>