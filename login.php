<?php

// Conexão com o banco de dados
include 'config.php';

// Obter dados do formulário
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Validar credenciais
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
$result = mysqli_query($conn, $sql);

// Se o usuário for encontrado
if (mysqli_num_rows($result) > 0) {

    // Armazenar o nome do usuário em um cookie
    setcookie('usuario', $usuario, time() + 3600); // Expira em 1 hora

    // Redirecionar para a página inicial
    header('Location: home.php');

} else {

    // Exibir mensagem de erro
    echo "<p>Usuário ou senha incorretos!</p>";

}

?>
