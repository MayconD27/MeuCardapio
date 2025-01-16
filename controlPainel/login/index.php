<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body>
    <main>
        <div class="bkg"></div>
        <section>
            <div class="logo">
                   <img src="../../img/logo.png" class="img_logo" alt="logo_vara_quebrada">
            </div>
            <div class="line"></div>
            <form action="logar.php" method="post" class="form_login">
                
                <div class="text">
                    <h1>Login</h1>
                    <p>Entre com seu login e senha para acessar o sistema</p>
                </div>
                <div>
                    <input type="text" placeholder="login" name="login">
                    
                    <div class="pass">
                        <input type="password" placeholder="senha" name="senha">
                    
                    </div>
                    <div class="button">
                        <button type="submit">Entrar</button>
                    </div>
                    
                </div>
            </form>
        </section>
        
    </main>
</body>
</html>