<div class="menu" id="menu">
     <div class="overlay"></div>

     <div class="menu-container">

          <span class="material-icons-outlined bttn-close">close</span>

          <ul class="options">
               <div class="general">
                    {{-- Notes --}}
                    <li class="@if( request()->routeIs("notes.index") ) active @endif">
                         <a href="{{ route('notes.index') }}">
                              <span class="material-icons-outlined icons">lightbulb</span>
                              Notes
                         </a>
                    </li>

                    {{-- Trash --}}
                    <li class="@if( request()->routeIs("notes.trash") ) active @endif">
                         <a href="{{ route('notes.trash') }}">
                              <span class="material-icons-outlined icons">delete</span>
                              Trash
                         </a>
                    </li>
               </div>

               <div class="labels">
                    <h3 class="title">Labels</h3>
                    
                    @foreach ($user->labels as $label)
                        <li>
                              <a href="">
                                   <span class="material-icons-outlined icons">label</span>
                                   {{ $label->name }}
                              </a>
                         </li>
                    @endforeach

                    <li>
                         <a href="">
                              <span class="material-icons-outlined icons">edit</span>
                              Edit labels
                         </a>
                    </li>

                    <li>
                         <a href="">
                              <span class="material-icons-outlined icons">add</span>
                              Create new label
                         </a>
                    </li>
               </div>
          </ul>

     </div>

</div>