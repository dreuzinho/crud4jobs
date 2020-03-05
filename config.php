<?php
    try{
        $pdo = new PDO("mysql:dbname=reg_convite;host=localhost", "root", "");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
        exit;
    }
?>