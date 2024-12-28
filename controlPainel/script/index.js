const page = document.querySelector('#listItens');





// Faz a requisição POST para o PHP
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
                             "   <li class='dropdown-item'><i class='bi bi-trash3'></i> Apagar</li>"+
                              "  <li class='dropdown-item'><i class='bi bi-pencil-square'></i> Editar</li>"+
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