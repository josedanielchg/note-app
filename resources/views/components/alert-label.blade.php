<script>
     const editLabelBttn = document.getElementById("edit_label-bttn");
     const menu = document.getElementById("menu");

     document.addEventListener("click", e=> {

          if(e.target == editLabelBttn || e.target.matches(".edit_label-bttn *")){
               menu.classList.remove("active");

               Swal.fire({
                    title: '<strong>Edit Labels:</strong>',
                    html: `
                         <form action="{{ route("labels.update") }}" class="form-labels home" method="post" id="alert-label-form">
                              @csrf
                              @method("put")
                              <div class="input-container">
                                   <span class="material-icons-outlined">&#xe145;</span>
                                   <input type="text" name="new_label" placeholder="Create new label..." class="create-input">
                              </div>

                              @foreach ($user->labels as $label)
                                   <div class="input-container alert-label-container"> 
                                        <input type="text" name="id-labels[]" value="{{ $label->id }}" style="display:none;">{{-- id's labels order --}}
                                        <input type="checkbox" id="del-{{ $label->id }}" name="delete-labels[]" value="{{ $label->id }}" style="display:none;" class="delete-checkbox">  {{-- labels deleted id's --}}
                                        <input type="text" name="labels[]" id="label-{{ $label->id }}" value="{{ $label->name }}">

                                        <label class="icons">
                                             <span class="material-icons-outlined label-icon">&#xe892;</span>
                                             <label for="del-{{ $label->id }}" class="material-icons delete-icon">&#xe872;</label>
                                        </label>
                                        <label for="label-{{ $label->id }}" class="material-icons-outlined icons edit">edit</label>
                                   </div>
                              @endforeach

                              <div>
                                   <input type="submit" value="Save">
                              </div>
                         </form>
                    `,
                    showCloseButton: true,
                    showConfirmButton: false,
                    customClass: {
                         title: 'alert-title'
                    },
               })
          }
     })
</script>