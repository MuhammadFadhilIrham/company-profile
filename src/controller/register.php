<?php
require '../../database/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);
        header('Location: ../../public/index.php?register=success');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
