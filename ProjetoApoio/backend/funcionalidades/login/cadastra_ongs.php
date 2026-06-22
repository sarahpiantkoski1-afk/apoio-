<?php
require_once('../config.php');

$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];

if ($senha == $confirmar_senha) {
    $hash = password_hash($senha, PASSWORD_BCRYPT);
    $consulta = $mysqli->prepare("INSERT INTO ongs (nome, cnpj, email, senha) values (?, ?, ?, ?)");
    $consulta->bind_param("ssss", $nome, $cnpj, $email, $hash);
    $consulta->execute();
    // aparece mensagem de "Parabéns, você criou uma conta !
    header("Location: ../../../frontend/telas/inicio.php");
    exit();
} else {
    // aparece uma mensagem de "ERRO, informações inválidas"
    header("Location: ../../../frontend/telas/login/cadastro_ongs.php");
    exit();
}

?> 