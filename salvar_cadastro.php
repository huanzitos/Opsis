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

// Obtém os dados do formulário
$nome = $_POST["nome"];
$data_nascimento = $_POST["data_nascimento"];
$local_nascimento = $_POST["local_nascimento"];
$local_residencia = $_POST["local_residencia"];
$sexo = $_POST["sexo"];
$cpf = $_POST["cpf"];
$cns = $_POST["cns"];
$rg = $_POST["rg"];
$mae = $_POST["mae"];
$pai = $_POST["pai"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$redes_sociais = $_POST["redes_sociais"];
$ocupacao = $_POST["ocupacao"];

// Prepara a consulta SQL para inserir os dados no banco de dados
$sql = "INSERT INTO pecas (nome, data_nascimento, local_nascimento, local_residencia, sexo, cpf, cns, rg, mae, pai, endereco, numero, redes_sociais, ocupacao) VALUES ('$nome', '$data_nascimento', '$local_nascimento', '$local_residencia', '$sexo', '$cpf', '$cns', '$rg', '$mae', '$pai', '$endereco', '$numero', '$redes_sociais', '$ocupacao')";

// Executa a consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar peça: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>