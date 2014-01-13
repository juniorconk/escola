<!DOCTYPE html>
<html>
    <head>
        <title>Escola Booststrap</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="jumbotron">
            <form action="valida.php" method="POST">
                <h1 style="font: arial; color:blue " class="nome" id="nome">Tarefa bootstrap</h1>
                <label>Login: <input type="text" name="login"></label><br>
                <label>Senha:<input type="password" name="senha"></label><br>
                <input type="submit" class="btn btn-primary btn-lg" name="enviar" value="enviar">
                <a href="<?php echo 'usuario/cadastro_usuario.php'; ?>">
                    <input class="btn btn-primary btn-lg" value="Cadastrar Usuario">
                </a>
            </form>
        </div>       
        <?php
        include_once 'include/footer.php';
        ?>