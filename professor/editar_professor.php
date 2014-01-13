<?php
include '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$id = $_GET['id'];
$nome = $_POST['nome'];
$disciplina = $_POST['disciplina'];
if ($nome != '' && $disciplina != '') {
    try {
        $ins = $conn->prepare("UPDATE professor SET nome = :nome, disciplina = :disciplina WHERE id_professor = :id");
        $ins->execute(array(
            ':id' => $id,
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
                <input type="email" class="form-control" name="nome" value="<?php echo $_GET['nome'] ?>" >
            </label>
            <label >Disciplina
                <input type="text" class="form-control" name="disciplina" value="<?php echo $_GET['disciplina'] ?>">
            </label>
            <input class="btn btn-success" type="submit" value="Enviar">
            <a href="../professor/professor.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
        </div>
    </div>
</form>

<?php
include '../include/footer.php';
