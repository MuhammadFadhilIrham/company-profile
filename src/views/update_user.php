<?php
require '../../database/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username = :username, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['username' => $username, 'email' => $email, 'id' => $id]);
        header('Location: ../../src/views/user_list.php?update=success');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
