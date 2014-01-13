<?php
include '../include/conexao.php';
$id = $_GET['id'];
try {
    $exc = $conn->prepare("delete from funcionario where id_funcionario = :id");
    $exc->bindParam(':id', $id);
    $exc->execute();
    header("Location: ../funcionario/funcionario.php");
} catch (Exception $ex) {
    echo 'Error' . $ex->getMessage();
}
?>