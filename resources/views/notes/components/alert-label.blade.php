<script>
     let addLabelBttn = document.getElementById("add-bttn");

     document.addEventListener("click", e=> {
          if(e.target == addLabelBttn || e.target.matches(".add-bttn *")){
               Swal.fire({
                    title: '<strong>Labels:</strong>',
                    html:
                         `<form action="{{ route("notes.add_label", $note) }}" class="form-labels" method="post">
                              @csrf
                              @method("put")
                              <div class="input-container">
                                   <span class="material-icons-outlined">&#xe145;</span>
                                   <input type="text" name="new_label" placeholder="Create new label..." class="create-input">
                              </div>

                              @foreach ($user->labels as $label)
                                   <div class="input-container alert-label-container">
                                        <label for="label-{{ $label->id }}">
                                             <span class="material-icons-outlined">&#xe892;</span>
                                             {{ $label->name }}
                                        </label>
                                        
                                        <input type="checkbox" name="labels[]" id="label-{{ $label->id }}" value="{{ $label->id }}" @if($note->labels->contains($label)) checked @endif>
                                   </div>
                              @endforeach

                              <div>
                                   <input type="submit" value="Save">
                              </div>
                         </form>`,
                    showCloseButton: true,
                    showConfirmButton: false,
                    customClass: {
                         title: 'alert-title'
                    }
               })
          }
     })
</script>

@if(session('labels_active_event'))
     <script>
          Swal.fire({
                    title: '<strong>Labels:</strong>',
                    html:
                         `<form action="{{ route("notes.add_label", $note) }}" class="form-labels" method="post">
                              @csrf
                              @method("put")
                              <div class="input-container">
                                   <span class="material-icons-outlined">&#xe145;</span>
                                   <input type="text" name="new_label" placeholder="Create new label..." class="create-input">
                              </div>

                              @foreach ($user->labels as $label)
                                   <div class="input-container alert-label-container">
                                        <label for="label-{{ $label->id }}">
                                             <span class="material-icons-outlined">&#xe892;</span>
                                             {{ $label->name }}
                                        </label>
                                        
                                        <input type="checkbox" name="labels[]" id="label-{{ $label->id }}" value="{{ $label->id }}" @if($note->labels->contains($label)) checked @endif>
                                   </div>
                              @endforeach

                              <div>
                                   <input type="submit" value="Save">
                              </div>
                         </form>`,
                    showCloseButton: true,
                    showConfirmButton: false,
                    customClass: {
                         title: 'alert-title'
                    }
               })
     </script>
@endif