import quill from "./editor_config.js";

let isDirty = false;
let formSubmitting = false;
const $title = document.getElementById("title-input");

quill.on('text-change', function(delta, oldDelta, source) {
     isDirty = true;
});

$title.addEventListener("change", e=>{
     isDirty = true;
})

window.addEventListener("beforeunload", (e) => {
     if (formSubmitting || !isDirty) {
          return;
     }
     
     e.returnValue = true;
     return true
});

window.addEventListener("submit", e => {
     formSubmitting = true;
});