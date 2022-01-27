<div class="card-container">
     <div class="card"style="background-color: {{$note->background->color}};">

          {{-- Card title & body --}}
          <a href="@isset($trash) {{route('notes.read_only', $note)}} @else {{route('notes.show', $note)}} @endisset" class="main-content">
               <h3>{{$note->title}}</h3>
               <div class="content">
                    {!!$note->body!!}
               </div>
          </a>

          {{-- Card tags --}}
          <div class="tags-container">
               @foreach ($note->labels as $label)
                   <a href="{{ route("labels.show", $label) }}" class="label">{{ $label->name }}</a>
               @endforeach
          </div>

          {{-- Card footer icons --}}
          <div class="icons">
               <a href="{{route('notes.show', $note)}}">
                    <i class="fas fa-arrow-right"></i>
               </a>
               <div class="options">
                    <i class="fas fa-ellipsis-v dropdown-menu-bttn"></i>
               </div>
          </div>
     </div>

     @isset($trash)
          <div class="dropdown">
               {{-- Delete button --}}
               <form action="{{ route('notes.destroy', $note) }}" method="post">
                    @csrf
                    @method("delete")
                    <button type="submit" class="menu-item">Delete Note</button>
               </form>

               {{-- Restore button --}}
               <form action="{{ route('notes.restore', $note) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="menu-item">Restore Note</button>
               </form>
          </div>
     @else
          <div class="dropdown">
               {{-- Delete button --}}
               <form action="{{ route('notes.sendTrash', $note) }}" method="post">
                    @csrf
                    @method("delete")
                    <button type="submit" class="menu-item">Delete Note</button>
               </form>

               <a href="" class="menu-item">Añadir etiqueta</a>
               <a href="" class="menu-item">Crear una copia</a>
               <a href="" class="menu-item">Agregar contribuidor</a>
          </div>
     @endisset
</div>
