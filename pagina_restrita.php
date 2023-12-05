<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Restrita</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo $usuario; ?>!</h2>
    <p>Esta é uma página restrita.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
