<?php
require 'config.php';
require 'auth.php';
if ($_SESSION['role'] == 'admin') {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tagihan WHERE id = $id");
}
header("Location: dashboard.php");
?>