<?php
include_once '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$nome = $_POST['nome'];
$funcao = $_POST['funcao'];
if ($nome != '' && $funcao != '') {
  try {
        $ins = $conn->prepare("insert into funcionario(nome,funcao) values (:nome,:funcao)");
        $ins->execute(array(
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
            <label>Nome
                <input type="text" class="form-control" name="nome" placeholder="nome" >
            </label>
            <label>Funcao
                <input type="text" class="form-control" name="funcao" placeholder="funcao">
            </label>
            <input class="btn btn-success" type="submit" value="Enviar">
            <a href="../funcionario/funcionario.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
        </div>
    </div>
</form>
<?php include_once '../include/footer.php';?>