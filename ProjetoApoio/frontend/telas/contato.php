<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Apoio+</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/forms.css">
</head>
<body>
    <header>
        <picture id="logo-img">
            <img src="../imagens/apoiomais.png" alt="Logo" class="logo-header">
        </picture>
        <nav id="options-header">
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="conteudo_educativo.php">Conteudo Educativo</a></li>
                <li><a href="postagens.php">Postagens</a></li>
                <li><a href="contato.php" class="active">Contato</a></li>
                <?php
                    if (!isset($_SESSION['usuario']) && (!isset($_SESSION['ong']))) {
                        echo '<li><a href="cadastro.php">Cadastre-se</a></li>';
                        echo '<li><a href="login.php">Entrar</a></li>';
                    } else {
                        if (isset($_SESSION['ong']) && (!isset($_SESSION['usuario']))) {
                            echo '<li><a href="post_ongs.php">Criar Post</a></li>';
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
                <h2>Nos envie uma mensagem!</h2>
            </article>
            <article class="form-down">
                <section class="contact">
    <picture class="infos-contact">
        <h4>Email</h4>
       <div class="email-item">
    <img src="../imagens/email.jpg" alt="Email" class="icone-contact">
    <p class="info-name">l4is00aguirre@gmail.com</p>
</div>

<div class="email-item">
    <img src="../imagens/email.jpg" alt="Email" class="icone-contact">
    <p class="info-name">sarahpiantkoski1@gmail.com</p>
</div>


        <a href="https://www.instagram.com/melaisss_/" target="_blank" rel="noopener noreferrer">
            <img src="../imagens/logo-instagram.avif" alt="Icone" class="icone-contact">
            <p class="info-name">Laís Aguirre</p>
        </a>
        <a href="https://www.instagram.com/sah_lorenaa/" target="_blank" rel="noopener noreferrer">
            <img src="../imagens/logo-instagram.avif" alt="Icone" class="icone-contact">
            <p class="info-name">Sarah Lorena</p>
        </a>
    </picture>
</section>

                
            </article>
        </section>
    </main>
    <footer>
        <p>Apoio+ - O guia colaborativo para jovens egressos de abrigos institucionais
        </p>
    </footer>
</body>
</html>