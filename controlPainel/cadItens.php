<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

    <main>
        <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 6.5rem; height:100vh;">
                <a href="/VaraQuebrada/controlPainel" class="d-block p-3 link-dark text-decoration-none logo"  data-bs-toggle="tooltip" data-bs-placement="right">
                    <img src="../img/logo.png" alt="logo">
                </a>
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                    <li class="nav-item">
                        <a href="./" class="nav-link  py-3 border-bottom" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right" onclick="oppenPage()">
                            <i class="bi bi-house"></i> 
                        </a>
                    </li>
                    <li>
                        <a href="cadItens.php" class="nav-link active py-3 border-bottom" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right" onclick="oppenPage()">
                            <i class="bi bi-patch-plus"></i>
                        </a>
                    </li>
                </ul>
                <div class="dropdown border-top">
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="34" height="34" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                    <li><a class="dropdown-item" href="#">Configurações</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sair</a></li>
                    </ul>
                </div>
        </div>
        <div id="page">
            <h2>Cadastro de produtos</h2>
            <form action="" class="form">
                <input type="file" src="" alt="">


                <input type="text">
                <input type="number" name="" id="">
                <div class="categoria">
                    <select name="" id="">
                        <option value="">Almoço</option>
                        <option value="">Bebida</option>
                        <option value="">Meia Porção</option>
                    </select>

                    <select name="" id="">
                        <option value="">sub categoria</option>
                    </select>
                </div>
               
                
                <textarea name="" id="" placeholder="descrição"></textarea>
            </form>
        </div>
    </main>
</body>
</html>