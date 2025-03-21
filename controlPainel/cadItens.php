<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .swal2-confirm{
            background-color:var(--primary-color);
        }
    </style>
</head>
<body>

    <main>
        <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 6.5rem; height:100vh;">
                <a href="/VaraQuebrada/controlPainel" class="d-block p-3 link-dark text-decoration-none logo"  data-bs-toggle="tooltip" data-bs-placement="right">
                    <img src="../img/logo-black.png" alt="logo">
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
                    <img src="../img/perfil.png" alt="mdo" width="34" height="34" class="rounded-circle">
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
            <form action="" class="form" id="meuForm">

                <label class="piture" tabIndex="0">
                    <input type="file" accept="image/*" src="" alt="" name="image" id="picture_input">
                    <span class="picture_image">Carrege a imagem</span>
                </label>
                <?php
                        $categorias = ['almoco','bebida','meia-porcao'];
                        $catNome = ['Almoço','Bebida','Meia Porção'];
                    ?>
                <div class="container-inputs">
                    <label for="" class="label-input">Nome do Item</label>
                    <input type="text" name="item" id="item" placeholder="ex: Batata">
                    
                    <label for="" class="label-input">Valor</label>
                    <input type="number" name="valor" id="valor" placeholder="0.00" step="0.01">
                    <div class="contariner-cat">
                        <div class="cat">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria">
                                <?php
                                        foreach($categorias as $cat){
                                            $nomeCat = $catNome[array_search($cat, $categorias)];
                                            

                                            echo "<option value='$cat'>
                                            $nomeCat
                                            </option>                                            
                                            ";
                                            
                                        }
                                    ?>
                            </select>
                        </div>

                        <div class="cat">
                            <label for="subcat">Sub-Categoria</label>
                            <select name="subcat" id="subcat">
                                
                            </select>
                        </div>
                        
                    </div>
                
                    <label for="" class="label-input">Descrição</label>
                    <textarea name="descricao" id="desc" placeholder="Descreva as informações do item"style="resize: none"></textarea>
                    <div class="container-btn">
                        <button type='submit'>Cadastrar</button>
                    </div>
                    </div>


            </form>
            
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="./script/interacao.js"></script>
    <script>
        const subCat = document.querySelector('#subcat');
        const cat = document.querySelector('#categoria');
        const categorias = ['almoco','bebida','meia-porcao'];

        const listSub = [['self-service'],['refrigerante'],['fritas']];      
        let list = '';

        cat.addEventListener('change',()=>{
            categorias.forEach((catG,index) => {                
                if (cat.value == catG) {
                    console.log(index);
                    list = listSub[index];
                }

                
            });

                subCat.innerHTML = '';
                // Adicionar as novas opções
                list.forEach(l => {
                    subCat.innerHTML += `<option value='${l}'>${l}</option>`;
                });
            
        })
    </script>
</body>
</html>