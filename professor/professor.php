<?php
include_once '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
$a = $conn->prepare("select * from professor");
$a->execute();
?>
<a style="padding: 10px;" href="cadastro_professor.php">Novo Professor</a>
<table border="1" style="margin: 5px;"class="table-striped">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>disciplina</th>
        <th>Ação</th>
    </tr>
    <?php while ($row = $a->fetch(PDO::FETCH_OBJ)) : ?>
        <tr>
            <td><?php echo $row->id_professor; ?></td>
            <td><?php echo $row->nome; ?></td>
            <td><?php echo $row->disciplina; ?></td>
            <td>
                <?php
                $id = $row->id_professor;
                if ($_SESSION['nivel'] <= 1) {
                echo "<a href='editar_professor.php?id=$id&nome=$row->nome&disciplina=$row->disciplina'>Editar</a>";
                echo " | ";
                    echo "<a href='excluir_professor.php?id=$id'>Deletar</a>";
                } else {
                    echo "voce nao tem capacidade para isso :p";
                }
                        ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<?php include_once '../include/footer.php'; ?>