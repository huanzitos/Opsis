<?php

// Iniciar sessão
session_start();

// Apagar o cookie do usuário
setcookie('usuario', '', time() - 3600); // Expira em 1 hora no passado

// Destruir a sessão
session_destroy();

// Redirecionar para a página inicial
header('Location: index.php');

?>