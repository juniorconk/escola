<?php
include_once '../include/menu.php';
include '../include/conexao.php';
include '../include/if.php';
 $a = $conn->prepare("select * from usuario");
$a->execute();
?>
<a style="padding: 10px;" href="cadastro_usuario.php">Novo Usuario</a>
<table border="1" style="margin: 5px;" class="table-striped">
    <tr>
        <th>ID</th>
        <th>Login</th>
        <th>Senha</th>
        <th>Nivel</th>
        <th>Acao</th>
    </tr>
<?php while ($row = $a->fetch(PDO::FETCH_OBJ)) : ?>
        <tr>
            <td><?php echo $row->id_usuario; ?></td> 
            <td><?php echo $row->login; ?></td>
            <td><?php echo $row->senha; ?></td>
            <td><?php echo $row->nivel;?></td>
            <td>
<?php $id = $row->id_usuario;
                if ($_SESSION['nivel'] <= 1) {
echo "<a href='editar_usuario.php?id=$id&login=$row->login&senha=$row->senha&nivel=$row->nivel'>Editar</a>";
echo " | ";
                    echo "<a href='excluir_usuario.php?id=$id'>Deletar</a>";
                } else {
                    echo "voce nao tem capacidade para isso :p";
                }
                ?>
            </td>
        </tr>
<?php endwhile; ?>
</table>
<?php include_once '../include/footer.php'; ?>