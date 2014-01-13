<?php
include '../include/conexao.php';
include '../include/if.php';
include '../include/menu.php';
$id    = $_GET['id'];
$nome  = $_POST['nome'];
$funcao = $_POST['funcao'];
if ($nome != '' && $funcao != '') {
    try {
        $ins = $conn->prepare("UPDATE funcionario SET nome = :nome, funcao = :funcao WHERE id_funcionario = :id");
        $ins->execute(array(
            ':id' => $id,
            ':nome' => $nome,
            ':funcao' => $funcao,
        ));
        header("Location: ../funcionario/funcionario.php");
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
?>
        <form method="POST" role="form">
    <div class="col-md-2">
        <div class="form-group">
            <label >Nome
                <input type="email" class="form-control" name="nome" value="<?php echo $_GET['nome'] ?>" >
            </label>
            <label >funcao
                <input type="text" class="form-control" name="funcao" value="<?php echo $_GET['funcao'] ?>">
            </label>
            <input class="btn btn-success" type="submit" value="Enviar">
            <a href="../funcionario/funcionario.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
        </div>
    </div>
</form>

<?php include '../include/footer.php'?> 