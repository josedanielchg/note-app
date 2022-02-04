<script>

document.addEventListener("submit", e=>{
    if(e.target.matches(".empty-trash")) {

          e.preventDefault();

          const swalAlert = Swal.mixin({
               customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
               },
               buttonsStyling: false
          })

          swalAlert.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Yes, delete it!',
               cancelButtonText: 'No, cancel!',
               reverseButtons: true
          }).then((result) => {
               if (result.isConfirmed) {
                    e.target.submit();
               } 
          })
    }
})

     
</script>