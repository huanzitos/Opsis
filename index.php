<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <form action="login.php" method="post">
        <h1>Login</h1>
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
