// import Qull from "../vendor/quill.js"
import Quill from 'quill';

let quill;

// UNDO and REDO buttons
let icons = Quill.import("ui/icons");
let editorContainer = document.getElementById('editor');

icons["undo"] = `<svg viewbox="0 0 18 18">
                              <polygon class="ql-fill ql-stroke" points="6 10 4 12 2 10 6 10"></polygon>
                              <path class="ql-stroke" d="M8.09,13.91A4.6,4.6,0,0,0,9,14,5,5,0,1,0,4,9"></path>
                         </svg>`;

icons["redo"] = `<svg viewbox="0 0 18 18">
                              <polygon class="ql-fill ql-stroke" points="12 10 14 12 16 10 12 10"></polygon>
                              <path class="ql-stroke" d="M9.91,13.91A4.6,4.6,0,0,1,9,14a5,5,0,1,1,5-5"></path>
                         </svg>`;

// Initialize Quill editor
if(editorContainer.classList.contains('readonly'))
{
     quill = new Quill('#editor', {
          modules: {
               toolbar: {
                    container: [
                         ['undo', 'redo'],
                         ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                         [{ 'align': [] }, 'blockquote'],
                         [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                         [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                    ],
                    handlers: {
                         undo: (value) => quill.history.undo(),
                         redo: (value) => quill.history.redo(),
                    }
               }
          },
          theme: 'snow',
          placeholder: 'Write Note',
          readOnly: true,

     });
}
else
{
     quill = new Quill('#editor', {
          modules: {
               toolbar: {
                    container: [
                         ['undo', 'redo'],
                         ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                         [{ 'align': [] }, 'blockquote'],
                         [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                         [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                    ],
                    handlers: {
                         undo: (value) => quill.history.undo(),
                         redo: (value) => quill.history.redo(),
                    }
               }
          },
          theme: 'snow',
          placeholder: 'Write Note',
     });
}

export default quill;