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
<html>
<head>
    <title>Cadastro de Peças</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        form {
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Peças</h1>
    <form action="salvar_cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento"><br><br>

        <label for="local_nascimento">Local de Nascimento:</label>
        <input type="text" name="local_nascimento" id="local_nascimento"><br><br>

        <label for="local_residencia">Local de Residência:</label>
        <input type="text" name="local_residencia" id="local_residencia"><br><br>

        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf"><br><br>

        <label for="cns">CNS:</label>
        <input type="text" name="cns" id="cns"><br><br>

        <label for="rg">RG:</label>
        <input type="text" name="rg" id="rg"><br><br>

        <label for="mae">Nome da Mãe:</label>
        <input type="text" name="mae" id="mae"><br><br>

        <label for="pai">Nome do Pai:</label>
        <input type="text" name="pai" id="pai"><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco"><br><br>

        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero"><br><br>

        <label for="redes_sociais">Redes Sociais:</label>
        <input type="text" name="redes_sociais" id="redes_sociais"><br><br>

        <label for="ocupacao">Ocupação:</label>
        <input type="text" name="ocupacao" id="ocupacao"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>