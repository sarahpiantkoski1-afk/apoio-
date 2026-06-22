<?php

require_once('config.php');
$ong_id = $_SESSION['ong_id'];
$titulo = $_POST['titulo'];
$link = $_POST['link'];
$descricao = $_POST['descricao'];

$consulta = $mysqli->prepare("INSERT INTO postagens (ong_id, titulo, descricao, link) VALUES (?, ?, ?, ?)");
$consulta->bind_param("isss", $ong_id, $titulo, $descricao, $link);
$consulta->execute();

header("Location: ../../frontend/telas/inicio.php");
exit();
?>