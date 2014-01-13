<?php

include '../include/conexao.php';
$id = $_GET['id'];
try {
    $exc = $conn->prepare("delete from usuario where id_usuario = :id");
    $exc->bindParam(':id', $id);
    $exc->execute();
    header("Location: ../usuario/usuario.php");
} catch (Exception $ex) {
    echo 'Error' . $ex->getMessage();
}
?>