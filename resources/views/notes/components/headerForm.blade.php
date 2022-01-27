@isset($readOnly)
     <div class="options">
          <button class=" button-icon" type="submit"><span class="material-icons-outlined">&#xe938;</span> Restore</button>
     </div>
@else
    <div class="options">
          <button class=" button-icon" type="submit"><span class="material-icons-outlined">&#xe161;</span> Save</button>
          <button class="material-icons-outlined icons dropdown-menu-colors" type="button">&#xe3b7;</button>
          <button class="material-icons-outlined icons dropdown-menu-options" type="button">&#xe5d4;</button>
     </div>

     <div class="dropdown-colors dropdown-editor">
          @foreach ($colors as $color)
               @php
                    $classes = "color-label";
                    $content = "";
                    $checked = "";

                    if($color->color == "#f3f3f3") {
                         $classes = $classes . " material-icons-outlined";
                         $content = "invert_colors_off";

                         //In create note view
                         if(!isset($note)) {
                              $classes = $classes . " active";
                              $checked = "checked";
                         }
                    } 

                    //In show note view
                    if(isset($note))
                         if($color->id == $note->background->id) {
                              $classes = $classes . " active";
                              $checked = "checked";
                         }
               @endphp
               <input type="radio" name="background-color" id="{{$color->color}}" value="{{$color->id}}" {{$checked}}>
               <label for="{{$color->color}}" class="{{$classes}}" style="background: {{$color->color}};" data-color="{{$color->color}}">{{$content}}</label>
          @endforeach
     </div>

     <textarea name="body" id="note-body" class="note-textarea"></textarea>
     <input type="text" name="note-title" id="note-title" class="note-title" value="">
@endisset