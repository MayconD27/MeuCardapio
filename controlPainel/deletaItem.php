<?php
include_once 'bd.php';

// Verifica se o ID foi enviado corretamente
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Força a conversão do valor de id para inteiro
    $id = intval($_POST['id']);    
    // Para depuração, imprime o valor do ID
    
    try {
        // Prepara a query para deletar o item com o ID fornecido
        $stmt = $bd->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);

        // Executa a consulta
        $stmt->execute();

        echo "Remoção bem sucedida";

    } catch (PDOException $e) {
        // Exibe mais detalhes sobre o erro de SQL
        echo "Erro ao deletar item: " . $e->getMessage();
    }
} else {
    echo "ID não fornecido ou inválido.";
}
?>
