<?php
require 'config.php';
require 'auth.php';

if ($_SESSION['role'] !== 'admin') die("Akses Ditolak!");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tagihan WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $status = $_POST['status'];
    $stmt = mysqli_prepare($conn, "UPDATE tagihan SET status_bayar = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Status</title>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Update Status Pelanggan</h2>
        <p class="mb-4 text-gray-600">Pelanggan: <strong><?= htmlspecialchars($data['nama_pelanggan']) ?></strong></p>
        <form method="POST">
            <select name="status" class="w-full border p-2 mb-4 rounded">
                <option value="Belum Bayar" <?= $data['status_bayar'] == 'Belum Bayar' ? 'selected' : '' ?>>Belum Bayar</option>
                <option value="Lunas" <?= $data['status_bayar'] == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
            </select>
            <button name="update" class="w-full bg-green-600 text-white py-2 rounded">Update Status</button>
            <a href="dashboard.php" class="block text-center mt-4 text-gray-400 text-sm">Batal</a>
        </form>
    </div>
</body>
</html>