<?php
// Verificar se o usuário está logado e obter o nome do usuário do cookie
if (!isset($_COOKIE['usuario'])) {
    // Redirecionar para o login se não estiver logado
    header('Location: login.php');
    exit;
}

$usuario = $_COOKIE['usuario'];

include 'config.php';

// Consultar o banco de dados para obter a permissão do usuário
$sql = "SELECT nivel FROM usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $permissao = $row['nivel'];

    // Verificar a permissão do usuário
    if ($permissao === 'admin') {
        // O usuário tem permissão de administrador
    } else {
        // O usuário não tem permissão de administrador
        header('Location: sem_permissao.php');
        exit;
    }
} else {
    // Usuário não encontrado no banco de dados
    header('Location: sem_permissao.php');
    exit;
}

// Verificar se um ID de peça foi fornecido para exclusão
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // Preparar a consulta SQL para excluir a peça pelo ID
    $sqlDelete = "DELETE FROM pecas WHERE id = $deleteId";

    // Executar a consulta SQL de exclusão
    if ($conn->query($sqlDelete) === TRUE) {
        echo "Peça excluída com sucesso.";
    } else {
        echo "Erro ao excluir a peça: " . $conn->error;
    }
}

// Verificar se os dados do novo usuário foram enviados
if (isset($_POST['criar_usuario'])) {
    $nomeNovoUsuario = $_POST['nome_usuario'];
    $nivelNovoUsuario = $_POST['nivel_usuario'];
    $senhaNovoUsuario = $_POST['senha_usuario'];

    // Preparar a consulta SQL para criar um novo usuário
    $sqlCriarUsuario = "INSERT INTO usuarios (usuario, nivel, senha) VALUES ('$nomeNovoUsuario', '$nivelNovoUsuario', '$senhaNovoUsuario')";

    // Executar a consulta SQL para criar o novo usuário
    if ($conn->query($sqlCriarUsuario) === TRUE) {
        echo "Novo usuário criado com sucesso.";
    } else {
        echo "Erro ao criar novo usuário: " . $conn->error;
    }
}

// Obter todos os usuários do banco de dados
$sqlUsuarios = "SELECT * FROM usuarios";
$resultUsuarios = $conn->query($sqlUsuarios);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel Admin</title>
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Painel Admin</h1>

    <h2>Excluir Peça</h2>
    <form action="" method="GET">
        <label for="delete_id">ID da Peça:</label>
        <input type="text" name="delete_id" id="delete_id">
        <input type="submit" value="Excluir">
    </form>

    <h2>Criar Novo Usuário</h2>
    <form action="" method="POST">
        <label for="nome_usuario">Nome:</label>
        <input type="text" name="nome_usuario" id="nome_usuario">
        <label for="nivel_usuario">Nível:</label>
        <select name="nivel_usuario" id="nivel_usuario">
            <option value="admin">admin</option>
            <option value="usuario">user</option>
        </select>
        <label for="senha_usuario">Senha:</label>
        <input type="password" name="senha_usuario" id="senha_usuario">
        <input type="submit" name="criar_usuario" value="Criar Usuário">
    </form>

    <h2>Lista de Usuários</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nível</th>
        </tr>
        <?php
        if ($resultUsuarios->num_rows > 0) {
            while ($rowUsuario = $resultUsuarios->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $rowUsuario["id"] . "</td>";
                echo "<td>" . $rowUsuario["usuario"] . "</td>";
                echo "<td>" . $rowUsuario["nivel"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum usuário encontrado.</td></tr>";
        }
        ?>
    </table>

    <a href="logout.php">Sair</a>
</body>
</html>