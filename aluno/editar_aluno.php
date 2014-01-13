<?php
include '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$id = $_GET['id'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$curso = $_POST['curso'];
$cursoName = $_GET['curso'];
if ($nome != '' && $login != '') {
    try {
        $ins = $conn->prepare("UPDATE aluno SET nome = :nome, login = :login, curso = :curso WHERE id_aluno = :id");
        $ins->execute(array(
            ':id' => $id,
            ':nome' => $nome,
            ':login' => $login,
            ':curso' => $curso
        ));
        header("Location: ../aluno/aluno.php");
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
?>
<form method= "POST" role="form">
    <div class= "col-md-2">
        <div class="form-group">
    <label>Nome
        <input type= "text" id= "nome" class= "col-xs-5 form-control" name= "nome" value= "<?php echo $_GET['nome'] ?>"></label><br>
    <label for= "inputlogin" class= "sr-only"></label>
    <label>Login<input type= "text" id= "login" name= "login" class= "col-xs-5 form-control" value= "<?php echo $_GET['login'] ?>"></label><br>
    <?php
    $a = $conn->prepare("select * from curso order by nome='$cursoName' desc");
    $a->execute();
    ?>
    <label>Curso<br>
        <select name= "curso">
            <?php while ($row = $a->fetch(PDO::FETCH_OBJ)) : ?>
                <option value= "<?php echo $row->id_curso; ?>"><?php echo $row->nome ?></option>
<?php endwhile; ?>
        </select></label><br>
    <input type= "submit" class= "btn btn-success" value= "Enviar">
    <a href="../aluno/aluno.php"><input class="btn btn-danger" type="button" value="Voltar"></a>
        </div>
    </div>
</form>
<?php include '../include/footer.php'; ?>