<?php
include_once '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
if ($nome != '' && $descricao != '') {
    try {
        $ins = $conn->prepare("insert into curso(nome,descricao) values (:nome,:descricao)");
        $ins->execute(array(
            ':nome' => $nome,
            ':descricao' => $descricao,
        ));
        header("Location: ../curso/curso.php");
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
?>
<form method="POST" role="form">
    <div class="col-md-2">
        <div class="form-group">
            <label>Nome
                <input type="text" class="form-control" name="nome" placeholder="nome" >
            </label>
            <label>Descricao
                <input type="text" class="form-control" name="descricao" placeholder="descricao">
            </label>
            <input class="btn btn-success" type="submit" value="Enviar">
            <a href="../curso/curso.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
        </div>
    </div>
</form>
<?php include_once '../include/footer.php'; ?>