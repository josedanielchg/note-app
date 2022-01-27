let menuIsActive = false;

document.addEventListener("click", e=> { 

     const menuBttn = document.getElementById("sidebar-button");
     const menu = document.getElementById("menu");
     const menuContainer = menu.querySelector(".menu-container");

     if(menuIsActive) {
          if(e.target.matches(".bttn-close") || (e.target != menu && !menuContainer.contains(e.target)) ) {
               menu.classList.remove("active");
               menuIsActive = false
          }
     } else if(e.target == menuBttn || menuBttn.contains(e.target)) {
          menu.classList.add("active");
          menuIsActive = true;
     }

})