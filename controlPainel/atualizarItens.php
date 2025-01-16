<?php
    include_once "bd.php";

    $item = $_POST['item'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $subCategoria = $_POST['subcat'];
    // Acessando a superglobal correta para arquivos
    $image = $_FILES['image'];
    $id = $_POST['id'];
    $nome = basename($image['name']);

    $uploadFile = "../upload/$nome";
    echo "$uploadFile";

    $caminhoImg = "upload/$nome";

    if(move_uploaded_file($image['tmp_name'], $uploadFile)){
    // Prepare a consulta UPDATE
        $sql = "UPDATE produtos SET nome = :item, valor = :valor, descricao = :descricao, categoria = :categoria, subcategoria = :subcategoria, imagem = :foto WHERE id = :id";
        
        // Preparando o comando SQL
        $stmt = $bd->prepare($sql);
        
        // Bind dos parâmetros
        $stmt->bindParam(':item', $item);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':subcategoria', $subCategoria);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':foto',$caminhoImg);





        if($stmt->execute()){
            echo "<br>atualizado";
        }
        else{
            echo "não subiu";
        }

    
    }
    else{
        $sql = "UPDATE produtos SET nome = :item, valor = :valor, descricao = :descricao, categoria = :categoria, subcategoria = :subcategoria WHERE id = :id";
        
        // Preparando o comando SQL
        $stmt = $bd->prepare($sql);
        
        // Bind dos parâmetros
        $stmt->bindParam(':item', $item);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':subcategoria', $subCategoria);
        $stmt->bindParam(':id', $id);

        
        if($stmt->execute()){
            header('location: ../controlPainel');
        }
        else{
            echo "não subiu";
        }
    }

?>