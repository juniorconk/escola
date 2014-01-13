<?php
include '../include/conexao.php';
$login = $_POST['login'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
session_start();
if ($_SESSION['login']) {
    include '../include/menu.php';
}
if ($login != '' && $senha != '') {
    try {
        $ins = $conn->prepare("insert into usuario(login,senha,nivel) values (:login,:senha,:nivel)");
        $ins->execute(array(
            ':login' => $login,
            ':senha' => $senha,
            ':nivel' => $nivel
        ));
        header("Location: ../usuario/usuario.php");
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
?>
<!Doctype html> 
<html>
    <head>
        <title>Escola Bootstrap</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    </head>
    <body>
        <h1 style="color: blue;">Cadastro de usuario</h1>
        <form method="POST" role="form">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Login
                        <input type="text" class="form-control" name="login" placeholder="login" >
                    </label>
                    <label>Senha
                        <input type="password" class="form-control" name="senha" placeholder="senha">
                    </label>
                    <label>Nivel
                        <input type="text" class="form-control" name="nivel" placeholder="nivel" >
                    </label>
                    <input class="btn btn-success" type="submit" value="Enviar">
                    <?php
                    if ($_SESSION['login']) {
                        echo '<a href="../usuario/usuario.php"> <input class="btn btn-danger" type="button" value="Voltar"></a>';
                    } else {
                        echo '<a href="../index.php"> <input class="btn  btn-danger" type="button" value="Voltar"></a>';
                    }
                    ?>
                </div>
            </div>
        </form>
        <?php include_once '../include/footer.php'; ?>