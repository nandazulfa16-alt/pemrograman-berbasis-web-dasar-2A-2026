<?php
require 'config.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $username, $password, $role);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Berhasil Daftar! Silakan Login.'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Daftar Member WiFi</title>
</head>
<body class="bg-blue-50 flex justify-center items-center h-screen">
    <form method="POST" class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Registrasi WiFi</h2>
        <input type="text" name="username" placeholder="Username" class="w-full border p-2 mb-4 rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full border p-2 mb-4 rounded" required>
        <select name="role" class="w-full border p-2 mb-6 rounded">
            <option value="pelanggan">Pelanggan</option>
            <option value="admin">Admin (Owner)</option>
        </select>
        <button name="register" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Daftar</button>
        <p class="mt-4 text-center text-sm">Sudah punya akun? <a href="login.php" class="text-blue-500">Login</a></p>
    </form>
</body>
</html>