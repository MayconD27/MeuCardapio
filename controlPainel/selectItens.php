<?php

    include_once 'bd.php';

    // Prepara a consulta SQL
    $stmt = $bd->prepare("SELECT * FROM produtos");

    // Executa a consulta
    $stmt->execute();

    // Busca os resultados da consulta como um array associativo
    $produtos = $stmt->fetchAll();

    // Retorna os resultados em formato JSON
    echo json_encode($produtos);

?>
