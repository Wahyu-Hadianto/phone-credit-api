import axios from "axios";
let brandSelect =  document.getElementsByName("brand_select")[0];
const productSelect = document.getElementsByName("product_id")[0];
let productOrigin;
if(productSelect){ productOrigin = productSelect.children[0].outerHTML;}
const baseUrl = window.origin;



// =============== Request function ===================
const products  = async (brand)=>{
    const resp = await axios.get(  baseUrl+'/brand/'+ brand+'/products')
    .then(resp => {
        let optionProducts = resp.data.products;
        optionProducts.forEach(item => {
            let option = document.createElement("option");
            option.innerText = item.product_name;
            option.setAttribute("value",item.id)
            productSelect.removeAttribute("disabled")
            productSelect.appendChild(option)
        
        });
    })
 }
 if(brandSelect){
     brandSelect.addEventListener("change",function(){
         let brand = brandSelect.value;
         productSelect.innerHTML = productOrigin;
         productSelect.setAttribute("disabled",'')
         products(brand);
     })
 }
 