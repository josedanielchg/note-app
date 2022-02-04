
document.addEventListener("submit", e=>{

})

document.addEventListener("change", e=>{
     const $deleteCheckboxs = Array.from(document.querySelectorAll(".form-labels.home .delete-checkbox"));

     if($deleteCheckboxs.includes(e.target)) {
          const $formLabels = document.querySelector(".form-labels.home");
          $formLabels.submit();
     }
})