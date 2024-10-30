// Função para buscar os dados de um JSON remoto
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
    const container = document.getElementById('almSelf');
    const itensAlmoco = produtos
        .filter(item => item.categoria === "Almoço" && item.subcategoria === "Self") // Filtra os itens
        .map(item => {
            return `
                <div class="card-item">
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
        })
        
    container.innerHTML = itensAlmoco;
}

window.onload = buscarProdutos; 
