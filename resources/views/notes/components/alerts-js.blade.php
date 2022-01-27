<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     @if ($errors->any())
          Swal.fire({
               icon: 'error',
               title: 'Oops... Error',
               html:
               '<ul class="alert-list">' +
                    @foreach ($errors->all() as $error)
                    `<li class="alert-item">{{ $error }}</li>` +
                    @endforeach
               '</ul>',
               text: 'Something went wrong!',
          })
     @endif

     @if(session('info'))
               Swal.fire({
               icon: 'success',
               title: '{{session('info')}}',
          })
     @endif
</script>