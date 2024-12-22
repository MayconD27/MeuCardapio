<?php

include_once 'bd.php';





// processa_formulario.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = isset($_POST['item']) ? $_POST['item'] : null;
    $valor = isset($_POST['valor']) ? $_POST['valor'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
    $subCategoria = isset($_POST['subcat']) ? $_POST['subcat'] : null;
    $imagem = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : null;

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
    echo json_encode([
        'status' => 'erro',
        'message' => 'Método não permitido'
    ]);
}
