<?php
include_once '../include/menu.php';
include '../include/conexao.php';
$nome = $_POST['nome'];
$disciplina = $_POST['disciplina'];
if ($nome != '' && $disciplina != '') {
    try {
        $ins = $conn->prepare("insert into professor(nome,disciplina) values (:nome,:disciplina)");
        $ins->execute(array(
            ':nome' => $nome,
            ':disciplina' => $disciplina,
        ));
        header("Location: ../professor/professor.php");
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
?>
<form method="POST" role="form">
    <div class="col-md-2">
        <div class="form-group">
            <label >Nome
                <input type="text" class="form-control" name="nome" placeholder="nome" >
            </label>
            <label >Disciplina
                <input type="text" class="form-control" name="disciplina" placeholder="disciplina">
            </label>
            <input class="btn btn-success" type="submit" value="Enviar">
            <a href="../professor/professor.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
        </div>
    </div>
</form>

<?php include_once '../include/footer.php'; ?>