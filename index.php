<?php
require_once "./dbconfig.php";

$sql = "SELECT * FROM comentarios";
$stmt = $pdo->prepare($sql);
$stmt->execute();
if($stmt->rowCount() > 0){
    $dados = $stmt->fetchAll();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de comentários</title>
</head>
<body>
    <h1>Sistema de comentários</h1>
    <form action="processa.php" method="post">
        <p><input type="text" name="nome" placeholder="Nome" autofocus></p>
        <p><textarea name="mensagem" cols="30" rows="10" placeholder="Mensagem"></textarea></p>
        <p><button name="btn">Enviar</button></p>
    </form>
    <hr>
    <h1>Comentários</h1>
    <?php
        if(isset($dados)):
            foreach($dados as $dado):
    ?>
    <p><strong>Nome: </strong><?= $dado['nome'];?></p>
    <p><strong>Mensagem: </strong><?= $dado['msg'];?></p>
    <p><strong>Data: </strong><?= date('d/m/Y H:i:s', strtotime($dado['data_msg']))?></p>
    <hr>
    <?php
        endforeach;
    endif;
    ?>
</body>
</html>