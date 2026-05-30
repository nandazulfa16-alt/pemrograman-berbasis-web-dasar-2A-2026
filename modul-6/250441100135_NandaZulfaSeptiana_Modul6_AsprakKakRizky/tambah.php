<?php
require 'config.php';
require 'auth.php';

if ($_SESSION['role'] !== 'admin') die("Akses Ditolak!");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $paket = $_POST['paket'];
    $jumlah = $_POST['jumlah'];
    $bulan = $_POST['bulan'];
    $status = $_POST['status'];
    $admin_id = $_SESSION['user_id'];

    $stmt = mysqli_prepare($conn, "INSERT INTO tagihan (nama_pelanggan, paket_wifi, jumlah_bayar, bulan_tagihan, status_bayar, created_by) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssdssi", $nama, $paket, $jumlah, $bulan, $status, $admin_id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Tagihan</title>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-6">Input Tagihan WiFi Baru</h2>
        <form method="POST" class="space-y-4">
            <input type="text" name="nama" placeholder="Nama Pelanggan" class="w-full border p-2 rounded" required>
            <select name="paket" class="w-full border p-2 rounded">
                <option value="10 Mbps">10 Mbps - Rp 150.000</option>
                <option value="20 Mbps">20 Mbps - Rp 250.000</option>
                <option value="50 Mbps">50 Mbps - Rp 450.000</option>
            </select>
            <input type="number" name="jumlah" placeholder="Jumlah Bayar (Hanya angka)" class="w-full border p-2 rounded" required>
            <input type="text" name="bulan" placeholder="Bulan (Contoh: Mei 2024)" class="w-full border p-2 rounded" required>
            <select name="status" class="w-full border p-2 rounded text-red-600 font-bold">
                <option value="Belum Bayar">Belum Bayar</option>
                <option value="Lunas">Lunas</option>
            </select>
            <button name="submit" class="w-full bg-blue-600 text-white py-2 rounded">Simpan Data</button>
            <a href="dashboard.php" class="block text-center text-gray-500">Kembali</a>
        </form>
    </div>
</body>
</html>