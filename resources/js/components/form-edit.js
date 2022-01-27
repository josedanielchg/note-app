document.addEventListener("submit", e=>{

     if(e.target.matches("#note-form")) {
          let form = document.querySelector("form"),
               $body = document.querySelector("#editor .ql-editor"),
               $title = document.querySelector(".title-input");

          form["note-title"].value = $title.value;
          form["note-body"].textContent = $body.innerHTML;
     }
})