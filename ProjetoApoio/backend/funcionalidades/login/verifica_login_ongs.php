<?php
require_once('../config.php');

$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$consulta = $mysqli->prepare("SELECT id, email, senha FROM ongs WHERE email = ? and cnpj = ?");
$consulta->bind_param("ss", $email, $cnpj);
$consulta->execute();

$resultado = $consulta->get_result();
$dados = $resultado->fetch_assoc();

$hash = $dados['senha'];

if ($dados) {
    if (password_verify($senha, $hash)) {      
        $_SESSION['ong'] = $email;
        $_SESSION['ong_id'] = $dados['id'];
        header("Location: ../../../frontend/telas/inicio.php");
        exit();
    } else {
        header("Location: ../../../frontend/telas/login/login_egressos.php?erro=informaçõesInvalidas");
        exit();
    }
} else {
    header("Location: ../../../frontend/telas/login/login_egressos.php?erro=informaçõesInvalidas");
    exit();
}

?>