<?php

include_once 'bd.php';

// processa_formulario.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'] ?? null;
    $valor = $_POST['valor'] ?? null;
    $descricao = $_POST['descricao'] ?? null;
    $categoria = $_POST['categoria'] ?? null;
    $subCategoria = $_POST['subcat'] ?? null;
    
    // Verifica se a imagem foi carregada sem erro
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagemTemp = $_FILES['image']['tmp_name'];  // Caminho temporário do arquivo
        $imagemNome = basename($_FILES['image']['name']);  // Nome original do arquivo (somente o nome, sem o caminho)
        $imagemDestino = "../upload/" . $imagemNome;  // Caminho final de destino com nome do arquivo



        // Tenta mover o arquivo para o diretório de destino
        if (move_uploaded_file($imagemTemp, $imagemDestino)) {
            $imagem = 'upload/' . $imagemNome;  // Caminho relativo da imagem
        } else {
            echo json_encode(['status' => 'erro', 'message' => 'Erro ao mover a imagem.']);
            exit; // Se falhar, interrompe o processamento
        }
    } else {
        echo json_encode(['status' => 'erro', 'message' => 'Erro ao fazer upload da imagem.']);
        exit;
    }

    try {
        // Prepara a consulta SQL
        $insert = $bd->prepare("INSERT INTO produtos (nome, valor, descricao, categoria, subCategoria, imagem) 
        VALUES (:nome, :valor, :descricao, :categoria, :subCategoria, :imagem)");

        // Vincula os parâmetros
        $insert->bindParam(':nome', $item);
        $insert->bindParam(':valor', $valor);
        $insert->bindParam(':descricao', $descricao);
        $insert->bindParam(':categoria', $categoria);
        $insert->bindParam(':subCategoria', $subCategoria);
        $insert->bindParam(':imagem', $imagem);

        // Executa a consulta
        $insert->execute();

        echo json_encode(['status' => 'sucesso', 'message' => 'Produto inserido com sucesso!']);

    } catch (PDOException $e) {
        echo json_encode(['status' => 'erro', 'message' => 'Erro ao inserir produto: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'erro', 'message' => 'Método não permitido']);
}
