<?php
require_once('../config.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];

if ($senha == $confirmar_senha) {
    $hash = password_hash($senha, PASSWORD_BCRYPT);
    $consulta = $mysqli->prepare("INSERT INTO egressos (nome, email, senha) values (?, ?, ?)");
    $consulta->bind_param("sss", $nome, $email, $hash);
    $consulta->execute();
    header("Location: ../../../frontend/telas/inicio.php");
    exit();
} else {
    header("Location: ../../../frontend/telas/login/cadastro_egressos.php");
    exit();
}

?> 