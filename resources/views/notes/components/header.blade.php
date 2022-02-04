<header class="header-note">
     <div class="container"">

          @isset($readOnly)
               <a href="{{route("notes.trash")}}" class="material-icons-outlined icons">&#xe5c4;</a>
          @else 
               <a href="{{route("notes.index")}}" class="material-icons-outlined icons">&#xe5c4;</a>
          @endisset

          @if($method == 'put')
               @isset($readOnly)
                    <form action="{{route("notes.restore", $note)}}" method="post" id="note-form">
                         @csrf
                         @method("put")
                         @include('notes.components.headerForm')
                    </form>
               @else
                    <form action="{{route("notes.update", $note)}}" method="post" id="note-form">
                         @csrf
                         @method("put")
                         @include('notes.components.headerForm')
                    </form>
               @endisset
          @else
               <form action="{{ route('notes.store') }}" method="post" id="note-form">
                    @csrf
                    @method("post")
                    @include('notes.components.headerForm')
               </form>
          @endif

          @isset($edit)
              <div class="dropdown-options dropdown-editor">
                    <a href="" class="menu-item">Add label</a>
                    
                    @if($method == 'put')
                         <form action="{{ route('notes.sendTrash', $note) }}" method="post">
                              @csrf
                              @method("delete")
                              <button type="submit" class="menu-item">Delete Note</button>
                         </form>
                         <a href="{{ route('notes.make_copy', $note) }}" class="menu-item">Make a copy</a>
                    @endif
               </div>
          @endisset
     </div>
</header>