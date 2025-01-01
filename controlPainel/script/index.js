const page = document.querySelector('#listItens');
function CarregaPag () {
    page.innerHTML = '';
    axios.post('selectItens.php')
    .then(function(response){
        // Exibe a resposta no console (dados retornados pelo servidor)
        console.log(response.data);
        response.data.map(itens=>{
            page.innerHTML+= "<div class='cardItem'>"+
                        "<img src='../"+ `${itens.imagem}` +"'alt=''>"+

                        "<div class='textCard'>"+
                         "   <div class='infoItem'>"+
                          `      <h3>${itens.nome}</h3>`+
                           `   <span class='cat'>${itens.categoria}</span>` +
                            `    <span class='subCat'>${itens.subCategoria}</span>`+
                            "</div>"+
                            
                            "<p>"+
                             `${itens.descricao}`  +
                            "<div class='preco'>"+
                             "   <p>Valor: </p>"+
                              "  <span>"+`${itens.valor}`+"</span>"+
                            "</div>"+
                            
                        "</div>"+
                        "<div class='functionCad dropdown'>"+
                         "   <button class='btn drowpdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>"+
                          "      <i class=' menu bi bi-three-dots-vertical'></i>"+
                           " </button>"+
                            "<ul class='dropdown-menu'>"+
                             "   <li class='dropdown-item' onclick = '"+`Deletar(${itens.id})`+"'><i class='bi bi-trash3'></i> Apagar</li>"+
                              `<a href='attItens.php?id=${itens.id}'>  <li class='dropdown-item'><i class='bi bi-pencil-square'></i>` +
                            "Editar</li></a>"+
                            "</ul>"+    
                        "</div>"+

                    "</div>"
        })
    })
    .catch(function(error){
        // Em caso de erro, exibe no console e alerta o usuário
        console.error('Erro ao enviar os dados', error);
        alert('Ocorreu um erro no envio dos dados');
    });

}
window.onload = CarregaPag;



// Faz a requisição POST para o PHP

    function Deletar(id) {
        
        // Envia o id como um objeto no corpo da requisição, com content-type 'application/x-www-form-urlencoded'
        Swal.fire({
            title: "Item cadastrado!",
            icon: "warning",
            showCancelButton:true,
            cancelButtonText: "Cancelar",
            confirmButtonText:"Remover",
            draggable: true

        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('deletaItem.php', `id=${id}`, {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                .then(function(response) {
                    console.log("Resposta do servidor:", response.data);
                })
                .catch(function(error) {
                    console.error("Erro ao deletar item:", error.response ? error.response.data : error.message);
                });
                CarregaPag();
            }
        });
        
    }
    