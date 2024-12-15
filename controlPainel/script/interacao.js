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
