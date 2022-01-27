let dropdownCardActive = false;
let dropdownHeaderActive = false;

document.addEventListener("click", e=> {
     const dropdownsCard = Array.from(document.querySelectorAll(".card-container .dropdown"));
     const dropdownHeader = document.querySelector(".header-container .dropdown");

     //Dropdown card
     if(dropdownCardActive) {
          dropdownsCard.find(el=> el.classList.contains("active")).classList.remove("active");
          dropdownCardActive = false;
     } else  if( e.target.matches(".dropdown-menu-bttn") ){
          e.target.closest(".card-container").lastElementChild.classList.add("active");
          dropdownCardActive = true;
     }
     
     //Dropdown header
     if(dropdownHeaderActive) {
          if(
               (!e.target.matches(".header-container .dropdown *") && !e.target.matches(".header-container .dropdown")) || 
               e.target.matches(".close-bttn")
          ){
               dropdownHeader.classList.remove("active");
               dropdownHeaderActive = false;
          }
     } else  if( e.target.matches(".dropdown-user-img")){
          e.target.closest(".header-container").lastElementChild.classList.add("active");
          dropdownHeaderActive = true;
     }

})