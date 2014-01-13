<!Doctype html> 
<html>
    <head>
        <title>Escola Bootstrap</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="estrutura" id="menu">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <ul class="nav nav-pills">
                <li><a href=<?php echo '../include/principal.php';?>>Home</a></li>
                <li><a href=<?php echo '../aluno/aluno.php';?>>Aluno</a></li>
                <li><a href=<?php echo'../professor/professor.php';?>>professor</a></li>
                <li><a href=<?php echo'../funcionario/funcionario.php';?>>Funcionario</a></li>
                <li><a href=<?php echo'../curso/curso.php';?>>curso</a></li>
                <li><a href=<?php echo '../usuario/usuario.php';?>>Perfil</a></li>
                <li><a href=<?php echo'../sair.php';?>>Sair</a></li>
            </ul>
        </nav>
        </div>