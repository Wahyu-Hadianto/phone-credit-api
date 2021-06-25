
const imagePreview = function(event){
        console.log(event.target)
}

let inputFile = document.getElementsByClassName("product-image");
console.log(inputFile)
// inputFile.forEach(input=>{
//     input.addEventListener("change",function(event){
//         console.log(event)
//     })
// })
for(let i = 0;i < inputFile.length;i++){
    inputFile[i].addEventListener("change",function(event){
        let imgView = this.nextElementSibling;
        imgView.classList.add("img-preview")
        let reader = new FileReader();
        reader.onload = function(){
            imgView.src =  reader.result;
        }
         reader.readAsDataURL(event.target.files[0]); 
    });
}