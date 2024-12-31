const inputFile = document.querySelector("#picture_input");
const pictureImg = document.querySelector('.picture_image');

pictureImg.innerHTML ='<i class="bi bi-camera"></i> Carregue a imagem';

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

//inputs
const img = document.querySelector('#picture_input');
const item = document.querySelector('#item');
const valor = document.querySelector('#valor');
const categoria = document.querySelector('#categoria');
const subCategoria = document.querySelector('#subcat');
const desc = document.querySelector('#desc');




const form = document.querySelector('#meuForm');

form.addEventListener('submit', (e)=>{
    e.preventDefault(); //Impede envio padrão do formulário
    
    //Coleta os dados do formulário
    const formDado = new FormData(form);

    //Testa exibição pra ver oq ta coletando
    axios.post('cadastrarItens.php',formDado)
        .then(function(response){
            console.log(response.data);
            Swal.fire({
                title: "Item cadastrado!",
                icon: "success",
                draggable: true
                
            }).then((result) => {
                if (result.isConfirmed) {
                    img.value ='';
                    pictureImg.innerHTML ='<i class="bi bi-camera"></i> Carregue a imagem';
                    item.value ='';
                    valor.value ='';
                    categoria.value ='';
                    subCategoria.value='';
                    desc.value = '';
                }
            });
        })
        .catch(function(error){
            console.error('Erro ao envair os dados',error);
            alert('Ocorreu um erro no envio dos dados');
        })
})


