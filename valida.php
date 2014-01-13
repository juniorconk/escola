<?php

include 'include/conexao.php';
$login = $_POST['login'];
$senha = $_POST['senha'];
$a = $conn->prepare("select * from usuario");
$a->execute();
while ($row = $a->fetch(PDO::FETCH_OBJ)) {
    if ($login == $row->login && $senha == $row->senha) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['nivel'] = $row->nivel;
    }
}

if ($_SESSION['login'] && $_SESSION['senha']) {
    header('Location: include/principal.php');
} else {
    header('Location: index.php');
}
?>

