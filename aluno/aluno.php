<?php
include_once '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$a = $conn->prepare("select a.id_aluno, a.nome,a.login, c.nome as curso 
from aluno a 
inner join curso c on (c.id_curso =a.curso) 
order by a.id_aluno;");
$a->execute();
?>
<a style="padding: 10px;" href="cadastro_aluno.php">Novo Aluno</a>
<table border="1" style="margin: 5px;" class="table-striped">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Login</th>
        <th>curso</th>
        <th>Ação</th>
    </tr>
    <?php while ($row = $a->fetch(PDO::FETCH_OBJ)) : ?>
        <tr>
            <td><?php echo $row->id_aluno; ?></td>
            <td><?php echo $row->nome; ?></td>
            <td><?php echo $row->login; ?></td>
            <td><?php echo $row->curso; ?></td>
            <td>
                <?php
                $id = $row->id_aluno;
                if ($_SESSION['nivel'] <= 1) {
                echo "<a href='editar_aluno.php?id=$id&nome=$row->nome&login=$row->login&curso=$row->curso'>Editar</a>";
                    echo " | ";
                    echo "<a href='excluir_aluno.php?id=$id'>Deletar</a>";
                } else {
                    echo "voce nao tem capacidade para isso :p";
                }
                ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<?php include_once '../include/footer.php'; ?>