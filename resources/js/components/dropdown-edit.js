let dropdownOptionActive = false;
let dropdownColorActive = false;

document.addEventListener("click", e=> {
     const dropdownOption = document.querySelector(".header-note .dropdown-options");
     const dropdownColor = document.querySelector(".header-note .dropdown-colors");

     //Dropdown Note Options 
     if(dropdownOptionActive) {
          if(
               (!e.target.matches(".header-note .dropdown-options *") && !e.target.matches(".header-note .dropdown-options")) 
          ){
               dropdownOption.classList.remove("active");
               dropdownOptionActive = false;
          }
     } else  if( e.target.matches(".dropdown-menu-options")){
          dropdownOption.classList.add("active");
          dropdownOptionActive = true;
     }
     
     // //Dropdown Note Colors
     if(dropdownColorActive) {
          if(
               (!e.target.matches(".header-note .dropdown-colors *") && !e.target.matches(".header-note .dropdown-colors")) 
          ){
               dropdownColor.classList.remove("active");
               dropdownColorActive = false;
          }
     } else  if( e.target.matches(".dropdown-menu-colors")){
          dropdownColor.classList.add("active");
          dropdownColorActive = true;
     }

})