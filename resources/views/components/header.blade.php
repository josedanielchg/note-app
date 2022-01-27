<div class="header-container">

     {{-- Header bar --}}
     <header class="header">
          <button class="sidebar-button" id="sidebar-button">
               <i class="fas fa-bars"></i>
          </button>

          @isset($trash)
               <form action="{{ route('notes.empty_trash') }}" method="post" class="empty-trash">
               <form action="" method="post" class="empty-trash">
                    @csrf
                    @method('delete')
                    <button type="submit">Empty Trash Now</button>
               </form>
          @else
               <form action="" method="post" class="input-search">
                    <input type="text" name="name" id="note-name" placeholder="&#xf002 Search your notes" style="font-family:Arial, FontAwesome">
                    <button type="submit">
                         <i class="fas fa-arrow-right"></i>
                    </button>
               </form>
          @endisset

          <div class="right-component">
               <div class="icons" id="change-view-bttn">
                    <button class="material-icons-outlined grid">&#xe9b0;</button>
                    <button class="material-icons-outlined list active">&#xE8E9;</button>
               </div>

               <div class="profile-image">
                    <img src="{{asset('storage/'. $user->image->path)}}" alt="No se ve" srcset="" class="dropdown-user-img">
               </div>
          </div>
     </header>

     {{-- Dropdown user --}}
     <div class="dropdown">
          <div class="user-data">
               <a href="" class="user-image">
                    <img src="{{asset('storage/'. $user->image->path)}}" alt="No se ve" srcset="">
                    <button class="material-icons-outlined icon-camera">&#xe412;</button>
               </a>
               
               <h2 class="username">{{$user->name}}</h2>
               <span class="email">{{$user->email}}</span>
          </div>

          <div class="user-options">
               <li><i class="fas fa-user-circle"></i> Profile</li>
               <li><i class="fas fa-sign-out-alt"></i> Log out</li>
          </div>

          <i class="fas fa-plus close-bttn"></i>
     </div>
</div>