document.addEventListener("click", e=> {
     const colorLabels = Array.from(document.querySelectorAll(".color-label"));

     if(e.target.matches(".color-label")) {
          colorLabels.forEach(el => el.classList.remove("active"));
          colorLabels.find(el => el == e.target).classList.add("active");
          document.querySelector("body").style.background = e.target.dataset.color;
     }
})