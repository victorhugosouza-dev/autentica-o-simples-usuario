<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";

    $username = $_POST["username"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Autenticação bem-sucedida
        $_SESSION["username"] = $username;
        header("Location: pagina_restrita.php");
    } else {
        // Autenticação falhou
        $erro = "Credenciais inválidas";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php
    if (isset($erro)) {
        echo "<p>$erro</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Usuário:</label>
        <input type="text" name="username" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
