/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/src/custom/js/image-preview.js ***!
  \**************************************************/
var imagePreview = function imagePreview(event) {
  console.log(event.target);
};

var inputFile = document.getElementsByClassName("product-image");
console.log(inputFile); // inputFile.forEach(input=>{
//     input.addEventListener("change",function(event){
//         console.log(event)
//     })
// })

for (var i = 0; i < inputFile.length; i++) {
  inputFile[i].addEventListener("change", function (event) {
    var imgView = this.nextElementSibling;
    imgView.classList.add("img-preview");
    var reader = new FileReader();

    reader.onload = function () {
      imgView.src = reader.result;
    };

    reader.readAsDataURL(event.target.files[0]);
  });
}
/******/ })()
;