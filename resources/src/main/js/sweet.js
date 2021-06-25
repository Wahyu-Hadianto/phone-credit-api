const Swal = require('sweetalert2');
// function

deleteList = function(event){
   const form = event.srcElement.children[0];
   Swal.fire({
    title: 'Apa Anda Yakin?',
    text: "Data yang di hapus tidak dapat dikembailkan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus ini!'
  }).then((result) => {
    if (result.isConfirmed) {
        form.submit()
    }
  })
}
alertSuccess = function(){
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
  })
}