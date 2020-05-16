<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=sistema_comentarios", 'root', '');
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}