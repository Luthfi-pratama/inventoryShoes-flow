<?php
include 'function/db.php';
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

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
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
                                <a class="dropdown-item" href="/Profile/profile.php"><i class="bi bi-person"></i>
                                    Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/settings/setting.php"><i class="bi bi-gear"></i>
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

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!--akhir sidebar-->

            <!-- Main Content -->
            <div class="col-lg-9 ms-auto mt-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            Berikan Komentar dan Rating untuk toko kami
                        </h5>
                        <form id="commentForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda" />
                                <div id="nameError" class="error-message"></div>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Komentar</label>
                                <textarea class="form-control" id="comment" rows="3"
                                    placeholder="Tulis komentar Anda"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label><br />
                                <!-- Rating stars -->
                                <span class="rating">
                                    <i class="bi bi-star" data-rating="1"></i>
                                    <i class="bi bi-star" data-rating="2"></i>
                                    <i class="bi bi-star" data-rating="3"></i>
                                    <i class="bi bi-star" data-rating="4"></i>
                                    <i class="bi bi-star" data-rating="5"></i>
                                </span>
                                <input type="hidden" name="rating" id="rating" />
                                <div id="ratingError" class="error-message"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Kirim Komentar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Main Content -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Toko Sepatu. All rights reserved.</p>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stars = document.querySelectorAll(".rating i");

            stars.forEach((star) => {
                star.addEventListener("click", function() {
                    stars.forEach((s) => s.classList.remove("text-warning")); // reset all stars
                    let rating = this.getAttribute("data-rating");
                    document.getElementById("rating").value = rating;
                    for (let i = 0; i < rating; i++) {
                        stars[i].classList.add("text-warning");
                    }
                });
            });

            document
                .getElementById("commentForm")
                .addEventListener("submit", function(event) {
                    let name = document.getElementById("name").value.trim();
                    let rating = document.getElementById("rating").value;

                    if (name === "") {
                        document.getElementById("nameError").textContent =
                            "Silakan masukkan nama Anda";
                        event.preventDefault();
                    } else {
                        document.getElementById("nameError").textContent = "";
                    }

                    if (!rating) {
                        document.getElementById("ratingError").textContent =
                            "Silakan pilih rating";
                        event.preventDefault();
                    } else {
                        document.getElementById("ratingError").textContent = "";
                    }
                });
        });
    </script>
</body>

</html>