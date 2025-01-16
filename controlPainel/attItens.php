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

</head>
<body>
<?php
    include_once "bd.php";
    $id = $_GET['id'];
    $stmt = $bd->prepare("SELECT * FROM produtos WHERE id=$id");
    $stmt->execute();
    $produtos = $stmt->fetchAll();

    ?>
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
                        <a href="cadItens.php" class="nav-link py-3 border-bottom" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right" onclick="oppenPage()">
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
            <h2>Atualizar Produto</h2>
            <form action="atualizarItens.php" method="POST" class="form" id="meuForm" enctype="multipart/form-data">
                <input type="number" value="<?php echo $produtos[0]['id'];?>" style="display:none;" name="id">
                <label class="piture" tabIndex="0">
                    <input type="file" accept="image/*" value="../<?php echo $produtos[0]['imagem']?>" alt="" name="image" id="picture_input">
                    <span class="picture_image"><img src="../<?php echo $produtos[0]['imagem']?>" alt=""></span>
                </label>
                <div class="container-inputs">
                    <label for="" class="label-input">Nome do Item</label>
                    <input type="text" name="item" id="item" placeholder="ex: Batata" value="<?php echo $produtos[0]['nome']?>">
                    
                    <label for="" class="label-input">Valor</label>
                    <input type="number" name="valor" id="valor" placeholder="0.00" value="<?php echo $produtos[0]['valor']?>" step="0.01">
                    <?php
                        $categorias = ['almoco','bebida','meia-porcao'];
                        $catNome = ['Almoço','Bebida','Meia Porção'];
                    ?>
                    <div class="contariner-cat">
                        <div class="cat">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria">

                                <?php
                                    foreach($categorias as $cat){
                                        $nomeCat = $catNome[array_search($cat, $categorias)];
                                        if($produtos[0]['categoria']==$cat){

                                            echo "<option value='$cat'selected>
                                            $nomeCat
                                            </option>                                            
                                            ";
                                        }else{

                                            echo "<option value='$cat'>
                                            $nomeCat
                                            </option>                                            
                                            ";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <?php
                            $sub = $produtos[0]['subCategoria'];
                        ?>
                        <div class="cat">
                            <label for="subcat">Sub-Categoria</label>
                            <select name="subcat" id="subcat">
                                
                                <option value="<?php echo $sub;?>">
                                    <?php echo $sub;?>
                                </option>

                            </select>
                        </div>
                        
                    </div>
                
                    <label for="" class="label-input">Descrição</label>
                    <textarea name="descricao" id="desc" placeholder="Descreva as informações do item"style="resize: none"><?php echo $produtos[0]['descricao'];?></textarea>
                    <div class="container-btn">
                        <button type='submit'>Atualizar dados</button>
                        
                    </div>
                    </div>


            </form>
            
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const inputFile = document.querySelector("#picture_input");
        const pictureImg = document.querySelector('.picture_image');

        inputFile.addEventListener('change',(e)=>{
            const inputTarget = e.target;
            const file = inputTarget.files[0];
            console.log(file);
            
            if(file){
                const reader = new FileReader();
                reader.addEventListener('load',(e)=>{
                    
                    const thisReader = e.target;

                    //criando a imagem
                    const img = document.createElement('img');
                    img.src = thisReader.result;
                    img.classList.add('picture_img');

                    //Apaga as imagens anteriores
                    pictureImg.innerHTML= '';
                    
                    pictureImg.appendChild(img);
                    ;
                })

                reader.readAsDataURL(file);

            }

        })
    </script>

    <script>
        const subCat = document.querySelector('#subcat');
        const cat = document.querySelector('#categoria');
        const categorias = ['almoco','bebida','meia porcao'];
        const listSub = [['self service','teste1'],['refrigerante','teste2'],['fritas','teste3']];      
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