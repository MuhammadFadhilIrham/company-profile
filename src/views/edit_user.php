<?php
require '../../database/db_connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="../controller/update_user.php?id=<?php echo $user['id']; ?>" method="POST" class="form-register">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
