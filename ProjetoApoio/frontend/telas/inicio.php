<?php
require_once('../../backend/funcionalidades/config.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Apoio+</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/postagens.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
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
                            echo '<li><a href="post_ongs.php">Criar Post</a></li>';
                        }
                        echo '<li><a href="logout.php" class="logout">LogOut</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <?php

        if (!isset($_SESSION['usuario']) && (!isset($_SESSION['ong']))) {
            echo '<section id="hero">';
            echo '<h1>Apoio+ — Conectando jovens egressos a oportunidades reais</h1>';
            echo '<p>Cadastre-se para receber notificações das atividades das ongs associadas!</p>';
            echo '<img src="../imagens/apoiomais.png" alt="logo" class="foto_comeco">';
            echo '<a href="login/cadastro_egressos.php" class="btn-primary">Cadastrar-se já</a>';
            echo '</section>';
        }
        ?>

        <section id="sobre">
            <h2>Sobre o Apoio+</h2>            
            <div class="card">
                <p>O Apoio + é uma plataforma digital criada para oferecer suporte prático e emocional a jovens que deixam o acolhimento institucional e precisam iniciar sua vida adulta de forma autônoma. No Brasil, ao completar 18 anos, muitos jovens são obrigados a sair dos abrigos, mesmo sem contar com rede de apoio, emprego ou moradia. Essa transição, marcada por desafios como desemprego, risco de rua e vulnerabilidade social, exige orientação, acolhimento e oportunidades concretas para que possam construir um futuro digno e independente.  

    </p>
    <p>Pensando nisso, o Apoio + reúne em um só espaço informações sobre direitos, mercado de trabalho, moradia e saúde, além de conteúdos educativos e relatos de experiências que fortalecem o apoio emocional. A plataforma também conecta os jovens a profissionais da psicologia e assistência social, divulga cursos gratuitos e programas de inclusão produtiva, e promove um ambiente interativo que incentiva a autonomia, o protagonismo juvenil e a construção de redes de apoio. Nosso objetivo é garantir que cada jovem tenha acesso às ferramentas necessárias para iniciar sua vida adulta com dignidade, confiança e esperança.  </p>
            </div>
        </section>

        <section id="oportunidades">
            <h2>Posts Recentes</h2>

            <?php
                $consulta = $mysqli->prepare("SELECT * FROM postagens ORDER BY data_postagem DESC LIMIT 5");
                $consulta->execute();
                $resultado = $consulta->get_result();

                if ($resultado->num_rows == 0) {
                    echo '<div class="card">';
                    echo '<h3>Buscando Postagens recentes</h3>';
                    echo '<p>Nenhuma postagem encontrada!</p>';
                    echo '</div>';
                } else {
                    echo "<div class='card-post'>";
                    while ($dados = $resultado->fetch_assoc()) {
                        echo "<div class='post'>";
                        echo "<h2>" . htmlspecialchars($dados['titulo']) . "</h2>";
                        echo "<p class='descricao'>" . nl2br(htmlspecialchars($dados['descricao'])) . "</p>";
                        echo "<p><a href='" . htmlspecialchars($dados['link']) . "' target='_blank' class='ver-mais'>Acessar link</a></p>";
                        echo "<p class='data'>Postado em: " . date("d/m/Y H:i", strtotime($dados['data_postagem'])) . "</p>";
                        echo "</div>";
                    }
                    echo "</div>";
                }
            ?>
        </section>


    </main>

    <footer>
        <p>Apoio+ - O guia colaborativo para jovens egressos de abrigos institucionais
        </p>
    </footer>
</body>
</html>
