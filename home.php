<?php

// Iniciar sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_COOKIE['usuario'])) {
    // Redirecionar para o login se não estiver logado
    header('Location: index.php');
    exit;
}

// Obter o nome do usuário
$usuario = $_COOKIE['usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home - Sistema de OPSIS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sistema OPSIS</h1>
        <p>Bem-vindo, <?php echo $usuario; ?>!</p>
    </header>

    <main>
        <section class="gerenciar-pecas">
            <h2>Gerenciar Peças</h2>
            <ul>
                <li><a href="cadastrar_peca.php">Cadastrar Peça</a></li>
                <li><a href="consultar_pecas.html">Consultar Peças</a></li>
            </ul>
        </section>

        <section class="outras-opcoes">
            <h2>Outras Opções</h2>
            <ul>
                <li><a href="#">Alterar Senha</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema OPSIS</p>
    </footer>
</body>
</html>
