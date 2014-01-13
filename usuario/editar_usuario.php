<?php
include '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$id = $_GET['id'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
if ($login != '' && $senha != '') {
    try {
        $ins = $conn->prepare("UPDATE usuario SET login = :login, senha = :senha, nivel = :nivel WHERE id_usuario = :id");
        $ins->execute(array(
            ':id' => $id,
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
<form method="POST" role="form">
    <div class="col-sm-2">
        <div class="form-group">
            <label>
                Login<input type="text" class="form-control" name="login" value="<?php echo $_GET['login'] ?>"></label>
            <label>
                Senha<input type="password" class="form-control" name="senha" value="<?php echo $_GET['senha'] ?>"></label>
            <label>
                Nivel<input type="text" class="form-control" name="nivel" value="<?php echo $_GET['nivel'] ?>"></label>
            <input class="btn btn-success" type="submit" value="Concluir">
            <a href="../usuario/usuario.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
        </div>
    </div>
</form>
<?php
include '../include/footer.php';
