<?php
session_start();

if (!isset($_SESSION['ong'])) {
    header("Location: inicio.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Post - Apoio+</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/forms.css">
    <link rel="shortcut icon" href="../imagens/favicon.png" type="image/x-icon">
</head>
<body>
    <header>
        <picture id="logo-img">
            <img src="../imagens/apoiomais.png" alt="Logo" class="logo-header">
        </picture>
        <nav id="options-header">
            <ul>
                <li><a href="inicio.php" class='active'>Inicio</a></li>
                <li><a href="conteudo_educativo.php">Conteudo Educativo</a></li>
                <li><a href="postagens.php">Postagens</a></li>
                <li><a href="contato.php">Contato</a></li>
                <?php
                    if (!isset($_SESSION['usuario']) && (!isset($_SESSION['ong']))) {
                        echo '<li><a href="cadastro.php">Cadastre-se</a></li>';
                        echo '<li><a href="login.php">Entrar</a></li>';
                    } else {
                        if (isset($_SESSION['ong']) && (!isset($_SESSION['usuario']))) {
                            echo '<li><a href="post_ongs.php" class="active">Criar Post</a></li>';
                        }
                        echo '<li><a href="logout.php" class="logout">LogOut</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <section class="form-container">
            <article class="form-up">
                <h2>Criando um novo post</h2>
            </article>
            <article class="form-down">

                
                <form action="../../backend/funcionalidades/criar_post.php" method="post">
                    
                
                    <label for="titulo">Título</label>
                    <input
                        type="text"
                        name="titulo"
                        id="titulo"
                        minlength="3"
                        maxlength="200"
                        placeholder="Vaga de emprego..."
                        required    
                    >

                    <label for="link">Link</label>
                    <input
                        type="text"
                        name="link"
                        id="link"
                        minlength="5"
                        maxlength="255"
                        placeholder="https://www.meublog.com"
                        required    
                    >

                    <label for="descricao">Descrição</label>
                    <textarea
                        name="descricao"
                        id="descricao"
                        cols="30"
                        rows="10"
                        placeholder="Escreva aqui..."
                        required
                    ></textarea>

                    <input type="submit" value="Postar" class="botao-executar">
                </form>
            </article>
        </section>
    </main>
    <footer>
        <p>Apoio+ - O guia colaborativo para jovens egressos de abrigos institucionais
        </p>
    </footer>
</body>
</html>