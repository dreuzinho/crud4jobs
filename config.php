<?php
    try{
        $pdo = new PDO("mysql:dbname=crud4jobs;host=localhost", "root", "");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
        exit;
    }
