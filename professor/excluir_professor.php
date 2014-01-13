<?php
include '../include/conexao.php';
$id = $_GET['id'];
try{
    $exc = $conn->prepare("delete from professor where id_professor = :id");
    $exc->bindParam(':id',$id);       
    $exc->execute();
    header("Location: ../professor/professor.php");
} catch (Exception $ex) {
    echo 'Error'.$ex->getMessage();
}
?>