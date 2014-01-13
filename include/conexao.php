<?php
$servidor = "localhost";
$dbname = "escola";
$usuario = "escola";
$senha = "escola";

try{
    $conn = new PDO("pgsql:dbname = $dbname; host = $servidor", "$usuario", "$senha");
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>