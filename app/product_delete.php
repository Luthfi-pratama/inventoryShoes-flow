<?php
require_once '../function/crud.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteProduct($id)) {
        header('Location: dashboard.php?success=2');
    } else {
        header('Location: dashboard.php?error=2');
    }
    exit();
} else {
    header('Location: dashboard.php');
    exit();
}
