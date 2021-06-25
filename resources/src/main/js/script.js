
//  ========== VARIABLE ================
const app           =   document.getElementById("app");
const sideBar       =   document.querySelector(".side-bar");
const menuToggle    =   document.querySelector('.menu-toggle');
// ============== UI FUNCTION ===============   
// MEnu Toggle =========
menuToggle.addEventListener("click",function(){
    menuToggle.classList.toggle("active");
    sideBar.classList.toggle("hide")
    app.classList.toggle("full")
});



