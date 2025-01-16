async function buscarProdutos() {
    try {
        // Modifique a URL para apontar para o arquivo PHP
        const response = await fetch('./controlPainel/selectItens.php'); 
        
        if (!response.ok) {
            throw new Error('Erro ao buscar os dados');
        }

        // Converte a resposta JSON em um array de objetos
        const produtos = await response.json(); 
        console.log(produtos);
        
        // Preenche a lista com os produtos recebidos
        preencherLista(produtos); 
    } catch (error) {
        console.error('Erro:', error);
    }
}

// Função para preencher a lista
function preencherLista(produtos) {
    const containerAlm = document.getElementById('almSelf');
    const containerBebi = document.getElementById('bebiRefri');
    const containerMeiaFrita = document.getElementById('meiaFrita');

    const itensAlmoco = produtos
        .filter(item => item.categoria === "almoco" && item.subCategoria === "self-service")
        .map(item => criarCard(item))
        .join('');

    const itensRefri = produtos
        .filter(item => item.categoria === "bebida" && item.subCategoria === "refrigerante")
        .map(item => criarCard(item))
        .join('');

    const itensMeiaFrita = produtos
        .filter(item => item.categoria === "meia-porcao" && item.subCategoria === "fritas")
        .map(item => criarCard(item))
        .join('');

    containerMeiaFrita.innerHTML = itensMeiaFrita;
    containerBebi.innerHTML = itensRefri;   
    containerAlm.innerHTML = itensAlmoco;
}

// Função para criar o card e adicionar evento de clique
function criarCard(item) {
    return `
        <div class="card-item" onclick="abrirOffcanvas('${item.nome}', '${item.descricao}', '${item.imagem}', ${item.valor})">
            <img src="${item.imagem}" alt="" class="img-item">
            <div class="text-card">
                <h4 class="nome-item">${item.nome}</h4>
                <p class="descri-item">${item.descricao}</p>
            </div>
            <div class="preco-item">
                <span>R$</span>
                <p class="valor-item">${item.valor.toFixed(2).replace('.', ',')}</p>
            </div>
        </div>
    `;
}

function abrirOffcanvas(nome, descricao, imagem, preco) {
    const offcanvasBody = document.querySelector('.offcanvas-body');
    offcanvasBody.innerHTML = `
        <div class="cont-img">
        <img src="${imagem}" alt="${nome}" class="img-canva">
        </div>

        <div class="detalhe-main">
            <div class="linha v"></div>
            <div class="cubo-canva"></div>
            <div class="linha v"></div>
        </div>

        <h4 class="nome-canva">${nome}</h4>
        <p class="descri-canva">${descricao}</p>
        <div class="container-preco">
            <div class="linha-canva"></div>
            <div class="preco-item">
                <span>R$</span>
                <p class="valor-item">${preco.toFixed(2).replace('.', ',')}</p>
            </div>
        </div>
    `;
    const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasBottom'));
    offcanvas.show();
}

window.onload = buscarProdutos;
