<?php
session_start();
require_once "./dbconfig.php";

if(isset($_POST['btn'])){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $msg = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "INSERT INTO comentarios (nome, msg, data_msg) VALUES(?,?,NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $nome);
    $stmt->bindValue(2, $msg);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        header("location: index.php");
    }else{
        $_SESSION['msg'] = "não existe comentários cadastrados";
    }

}else{
    header("location: index.php");
}