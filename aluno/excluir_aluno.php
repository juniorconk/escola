<?php

include '../include/conexao.php';
$id = $_GET['id'];
try{
    $exc = $conn->prepare("delete from aluno where id_aluno = :id");
    $exc->bindParam(':id',$id);       
    $exc->execute();
    header("Location: ../aluno/aluno.php");
} catch (Exception $ex) {
    echo 'Error'.$ex->getMessage();
}
?>