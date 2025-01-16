<?php
    session_start();
    include_once "../bd.php";

    $login = ($_POST['login']) ?  $_POST['login'] : '';
    $senha = ($_POST['senha']) ?  $_POST['senha'] : '';

    
    
    // SQL com prepared statement
    $sql = "SELECT * FROM user WHERE login = :login AND senha = :senha";
    // Prepara a consulta
    $resultado = $bd->prepare($sql);

    // Faz o bind dos parâmetros
    $resultado->bindParam(':login', $login);
    $resultado->bindParam(':senha', $senha);


    // Executa a consulta
    $resultado->execute();
    
    // Recupera os registros
    $registros = $resultado->fetchAll();
    
    
    if ($registros) {
 
        
        $_SESSION['logado'] = true;
        
        // Redireciona para a página inicial
        header('location: ../');
        exit;
    } else {
        // Caso não encontre o usuário
        header('location: ./');
        exit;
    }
        
?>
