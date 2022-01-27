document.addEventListener("click", e => {
     const changeViewBttns = document.getElementById("change-view-bttn");
     const gridView = changeViewBttns.querySelector(".grid");
     const listView = changeViewBttns.querySelector(".list");
     const notesSection = document.getElementById("notes-section");

     if(e.target == changeViewBttns || changeViewBttns.contains(e.target)) {

          if(gridView.classList.contains("active")) {
               gridView.classList.remove("active");
               listView.classList.add("active");
               notesSection.classList.add("grid");
               notesSection.classList.remove("list");
          } 
          else  if(listView.classList.contains("active")) {
               listView.classList.remove("active");
               gridView.classList.add("active");
               notesSection.classList.add("list");
               notesSection.classList.remove("grid");
          }
     }
})