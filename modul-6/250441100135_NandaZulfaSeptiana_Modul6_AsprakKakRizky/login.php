<?php
require 'config.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan Prepared Statement untuk keamanan
    // Ambil data user berdasarkan username saja
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    
    // Verifikasi password yang diinput dengan hash di database
    if (password_verify($password, $data['password'])) {
        $_SESSION['users'] = $data;
        header("Location: admin.php");
        exit();
    } else {
        echo "Password salah!";
    }
} else {
    echo "Username tidak ditemukan!";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login WiFi</title>
</head>
<body class="bg-blue-600 flex justify-center items-center h-screen">
    <form method="POST" class="bg-white p-8 rounded-lg shadow-2xl w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login WiFi</h2>
        <input type="text" name="username" placeholder="Username" class="w-full border p-2 mb-4 rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full border p-2 mb-6 rounded" required>
        <button name="login" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-bold">Masuk</button>
        <p class="mt-4 text-center text-sm text-gray-600">Belum daftar? <a href="register.php" class="text-blue-500 font-bold">Daftar</a></p>
    </form>
</body>
</html>