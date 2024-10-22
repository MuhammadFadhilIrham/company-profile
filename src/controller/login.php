<?php
session_start();
require '../../database/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cari user berdasarkan email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika user ditemukan, verifikasi password
    if ($user) {
        if (password_verify($password, $user['password'])) {
            // Jika password benar, buat session untuk user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: ../../src/views/user_list.php'); // Redirect ke halaman user list
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "User tidak ditemukan.";
    }
}
?>
