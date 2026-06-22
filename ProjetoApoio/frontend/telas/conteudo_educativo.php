<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteudo Educativo - Apoio+</title>
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
                <li><a href="conteudo_educativo.php" class="active">Conteudo Educativo</a></li>
                <li><a href="postagens.php">Postagens</a></li>
                <li><a href="contato.php">Contato</a></li>
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
            <article class="educativo">
                <h2 class="educativo-titulo">Conteudos educativos</h2>
                <h4 class="educativo-subtitulo">Encontre aqui videos já disponiveis na internet de cuidado e orientações úteis!</h4>
            </article>
            <article>
                
               
                <ul class="educativo-lista">
                    <li><a href="https://youtu.be/dCwOLOwmtkE?si=2xFWJX1Cj80DZiEi" target="_blank" rel="noopener noreferrer" >Instruções de um psicólogo sobre autocuidado</a></p>
                    <li><a href="https://youtu.be/DE8U1LpMffY?si=Lvbu42YTjlMm-jNa" target="_blank" rel="noopener noreferrer">Relato e orientação a jovens que recém completaram 18 anos</a></p>
                    <li><a href="https://youtu.be/3nSfnNmYJaY?si=PNmF1mStYVpvATma" target="_blank" rel="noopener noreferrer" >Dicas financeiras</a></p>
                    <li><a href="https://youtu.be/TDqhTRIhieM?si=IfY4f9aqzl2pgoEx" target="_blank" rel="noopener noreferrer" >Historias reais</a></p>
                    <li><a href="https://youtu.be/Vwj9o_Wpqp8?si=wNoqgeqqT169ebm6" target="_blank" rel="noopener noreferrer" >Dicas para jovens adultos</a></p>
                </ul>
                </article>
        </section>
    </main>
    <footer>
        <p>Apoio+ - O guia colaborativo para jovens egressos de abrigos institucionais
        </p>
    </footer>
</body>
</html>