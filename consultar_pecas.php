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

include 'config.php';

// Obtém o nome da peça da consulta
$nome = $_GET["nome"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Peças</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        .resultado {
            margin-bottom: 20px;
        }

        .resultado label {
            font-weight: bold;
        }

        .resultado span {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Consulta de Peças</h1>

    <?php
    // Prepara a consulta SQL para buscar as peças pelo nome
    $sql = "SELECT * FROM pecas WHERE nome LIKE '%$nome%'";

    // Executa a consulta SQL
    $result = $conn->query($sql);

    // Verifica se foram encontradas peças
    if ($result->num_rows > 0) {
        // Exibe os resultados encontrados
        while ($row = $result->fetch_assoc()) {
            echo "<div class='resultado'>";
            echo "<label>ID:</label><span>" . $row["id"] . "</span><br>";
            echo "<label>Nome:</label><span>" . $row["nome"] . "</span><br>";
            echo "<label>Data de Nascimento:</label><span>" . $row["data_nascimento"] . "</span><br>";
            echo "<label>Local de Nascimento:</label><span>" . $row["local_nascimento"] . "</span><br>";
            echo "<label>Local de Residência:</label><span>" . $row["local_residencia"] . "</span><br>";
            echo "<label>Sexo:</label><span>" . $row["sexo"] . "</span><br>";
            echo "<label>CPF:</label><span>" . $row["cpf"] . "</span><br>";
            echo "<label>CNS:</label><span>" . $row["cns"] . "</span><br>";
            echo "<label>RG:</label><span>" . $row["rg"] . "</span><br>";
            echo "<label>Nome da Mãe:</label><span>" . $row["mae"] . "</span><br>";
            echo "<label>Nome do Pai:</label><span>" . $row["pai"] . "</span><br>";
            echo "<label>Endereço:</label><span>" . $row["endereco"] . "</span><br>";
            echo "<label>Número:</label><span>" . $row["numero"] . "</span><br>";
            echo "<label>Redes Sociais:</label><span>" . $row["redes_sociais"] . "</span><br>";
            echo "<label>Ocupação:</label><span>" . $row["ocupacao"] . "</span><br>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>