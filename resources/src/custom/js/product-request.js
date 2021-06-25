// import Axios from 'axios';
// const baseUrl               = window.origin;
// const btnProductRequest     = document.querySelectorAll('.product-request');
// let modalTitle              = document.querySelector(".modal-title");
// let modalBody               = document.querySelector(".modal-body");
// const btnClose              = document.querySelector(".close-modal-product");
// // Price Variable
// let table                   = document.createElement("table");
// let tbody                   = document.createElement("tbody");

// let thead                   = document.createElement("thead");
// let thText                  = ['Konfigurasi','Harga','Harga Promo','Expired Promo','Aksi'];
// thText.forEach(item=> {
//     let th                      = document.createElement("th");
//     th.textContent = item
//     thead.appendChild(th)
// });

// // =============== DOM FUNCTION ==========================
// btnClose.addEventListener("click",function(){
//     modalBody.innerHTML = '';
// });
// const changeModalSpesifikasi = function(data=Object){
//         modalTitle.innerHTML    = `Spesifikasi Product`;
//         modalBody.innerHTML     = `
//         <div class="text-center">
//         <h5>${data.data.product_name}</h5>
//     <p><span>Brand:  ${data.data.brand}    | slug: ${data.data.slug}</span></p>
//     </div>
//     <table class="table">
//         <tr>
//             <th>Processor</th>
//             <td>${data.data.spesifikasi.processor}</td>
//         </tr>
//         <tr>
//             <th>Camera</th>
//             <td>${data.data.spesifikasi.camera}</td>
//         </tr>
//         <tr>
//             <th>Battery</th>
//             <td>${data.data.spesifikasi.battery}</td>
//         </tr>
//         <tr>
//             <th>Display</th>
//             <td>${data.data.spesifikasi.display}</td>
//         </tr>
//         <tr>
//             <th>Ram Storage</th>
//             <td>${data.data.spesifikasi.ram_storage}</td>
//         </tr>
//         <tr>
//             <th>Aksi</th>
//             <td><button class="btn btn-warning">Ubah</button></td>
//         </tr>
//     </table>  
//         `
// }
// const modalProductPrice = function(data=Object){
//     modalTitle.innerHTML    = `Harga Produk`;
//     modalBody.innerHTML     = 
//     `       
//         <div class="text-center">
//             <h5>${data.product_name}</h5>
//         <div>`
//     data.prices.forEach(price=>{
//         let tdKonf  = document.createElement("td");
//         let tdPn    = document.createElement("td");
//         let tdPs    = document.createElement("td");
//         let tdExp   = document.createElement("td");
//         let tr      = document.createElement("tr");
       
//        let td1 = tr.insertCell[0];
//        let td2 = tr.insertCell[1];
//        td1.innerHTML = price.ram_storage;
//        td2.innerHTML = price.price_normal;
//         tbody.appendChild(tr);
//     })
//     table.appendChild(thead);
//     table.appendChild(tbody);
//     modalBody.appendChild(table);

// }
// // =============== FUNCTION REQUEST ======================
// btnProductRequest.forEach(btn => {
//     btn.addEventListener("click",function(){
//         let request =btn.getAttribute("data-request");
//         let id = btn.getAttribute("data-id");
//         switch(request){
//             case "spesifikasi":
//                 Axios.get(baseUrl+'/api/product/'+id+'/spesifikasi')
//                 .then(resp =>{
//                     changeModalSpesifikasi(resp.data)
//                 })
//                 break;
//             case "price" : 
//                 Axios.get(baseUrl+'/api/product/'+id+'/price')
//                 .then(resp => {
//                     console.log(resp.data)
//                     modalProductPrice(resp.data);
//                 })
//                 break;
//             default:
//                 alert("Request Tidak Jelas");
//         }
       
//     })
// })