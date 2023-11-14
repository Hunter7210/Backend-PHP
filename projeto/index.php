<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ?$_POST["id"] :"";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ?$_POST["nome"] :"";
    $email = (isset($_POST["email"]) && $_POST["email"] != null) ?$_POST["email"] :"";
    $celular = (isset($_POST["celular"]) && $_POST["celular"] != null) ?$_POST["celular"] :"";
} elseif (!isset($id)) {
    
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] :"";
    $email = NULL;
    $celular = NULL;
}

try {
    $pdo = new PDO("mysql:host=127.0.0.1; dbname=produtos","root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Bloqueia a entrada de sql injection
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    $sql = "SET NAMES utf8";
    $result = $pdo->prepare($sql);
    $pdo->exec($result);

} catch (PDOException $e) {
    echo "". $e->getMessage() ."";
}