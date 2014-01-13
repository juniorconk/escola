<?php
include_once '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$nome = $_POST['nome'];
$login = $_POST['login'];
$curso = $_POST['curso'];
if ($nome != '' && $login != '') {
    try {
        $ins = $conn->prepare("insert into aluno(nome,login,curso) values (:nome,:login,:curso)");
        $ins->execute(array(
            ':nome' => $nome,
            ':login' => $login,
            ':curso' => $curso
        ));
        header("Location: ../aluno/aluno.php");
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
$a = $conn->prepare("select * from curso;");
$a->execute();
?>
<form method="POST" role="form">
    <div class="col-md-2">
        <div class="form-group">
            <label>Nome
                <input type="text" class="form-control" name="nome" placeholder="nome"></label>
            <label>Login
                <input type="text" class="form-control" name="login" placeholder="login"></label>
            <label>Curso<br>
                <select name= "curso">
                    <?php while ($row = $a->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value= "<?php echo $row->id_curso; ?>"><?php echo $row->nome ?></option>
                    <?php endwhile; ?>
                </select></label><br>
            <label>
                <input class="btn btn-success" type="submit" name="enviar" value="enviar"></label>
                <a href="../aluno/aluno.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
    </div>
    </div>
</form>  
<?php include_once '../include/footer.php'; ?>