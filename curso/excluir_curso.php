<?php
include '../include/conexao.php';
$id = $_GET['id'];
try{
    $exc = $conn->prepare("delete from curso where id_curso = :id");
    $exc->bindParam(':id',$id);       
    $exc->execute();
    header("Location: ../curso/curso.php");
} catch (Exception $ex) {
    echo 'Error'.$ex->getMessage();
}
?>