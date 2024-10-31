async function buscarProdutos() {
    try {
        const response = await fetch('./itens.json'); 
        if (!response.ok) {
            throw new Error('Erro ao buscar os dados');
        }
        const produtos = await response.json(); 
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
        .filter(item => item.categoria === "Almoço" && item.subcategoria === "Self")
        .map(item => criarCard(item))
        .join('');

    const itensRefri = produtos
        .filter(item => item.categoria === "Bebida" && item.subcategoria === "Refrigerante")
        .map(item => criarCard(item))
        .join('');

    const itensMeiaFrita = produtos
        .filter(item => item.categoria === "Meia" && item.subcategoria === "Frita")
        .map(item => criarCard(item))
        .join('');

    containerMeiaFrita.innerHTML = itensMeiaFrita;
    containerBebi.innerHTML = itensRefri;   
    containerAlm.innerHTML = itensAlmoco;
}

// Função para criar o card e adicionar evento de clique
function criarCard(item) {
    return `
        <div class="card-item" onclick="abrirOffcanvas('${item.nome}', '${item.descricao}', '${item.imagem}', ${item.preco})">
            <img src="${item.imagem}" alt="" class="img-item">
            <div class="text-card">
                <h4 class="nome-item">${item.nome}</h4>
                <p class="descri-item">${item.descricao}</p>
            </div>
            <div class="preco-item">
                <span>R$</span>
                <p class="valor-item">${item.preco.toFixed(2).replace('.', ',')}</p>
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