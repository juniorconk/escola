<?php
include '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$id = $_GET['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
if ($nome != '' && $descricao != '') {
    try {
        $ins = $conn->prepare("UPDATE curso SET nome = :nome, descricao = :descricao WHERE id_curso = :id");
        $ins->execute(array(
            ':id' => $id,
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
                <input type="email" class="form-control" name="nome" value="<?php echo $_GET['nome'] ?>" >
            </label>
            <label>funcao
                <input type="text" class="form-control" name="descricao" value="<?php echo $_GET['descricao'] ?>">
            </label>
            <input class="btn btn-success" type="submit" value="Enviar">
            <a href="../curso/curso.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
        </div>
    </div>
</form>
<?php
include '../include/footer.php';
