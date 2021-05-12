
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            cancelButton: 'btn btn-error normal-case',
            confirmButton: 'btn btn-primary normal-case mx-1',
        },
        buttonsStyling: false
    });

    // customClass: {
    // container: '...',
    // popup: '...',
    // header: '...',
    // title: '...',
    // closeButton: '...',
    // icon: '...',
    // image: '...',
    // content: '...',
    // input: '...',
    // inputLabel: '...',
    // validationMessage: '...',
    // actions: '...',
    // confirmButton: '...',
    // denyButton: '...',
    // cancelButton: '...',
    // loader: '...',
    // footer: '....'
    // }

    window.addEventListener('sweet-success-toast',function(e){ 
        swalWithBootstrapButtons.fire({
            position: 'top-end',
            icon: 'success',
            title: "<h2 class='text-sm font-semibold'>"+e.detail.message+"</h2>",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            toast: true,
        })
    });

    window.addEventListener('sweet-error-toast',function(e){ 
        swalWithBootstrapButtons.fire({
            position: 'top-end',
            icon: 'error',
            title: "<h2 class='text-sm font-semibold'>"+e.detail.message+"</h2>",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            toast: true,
        })
    });

    window.addEventListener('sweet-success-modal',function(e){ 
        swalWithBootstrapButtons.fire({
            icon: 'success',
            title: "<h2 class='text-sm font-semibold'>"+e.detail.message+"</h2>",
            padding: '1em',
            width: 320,
            showConfirmButton: false,
            timer: 3000,
        })
    });
    
    window.addEventListener('sweet-error-modal',function(e){ 
        swalWithBootstrapButtons.fire({
            icon: 'error',
            title: "<h2 class='text-sm font-semibold'>"+e.detail.message+"</h2>",
            padding: '1em',
            width: 320,
            showConfirmButton: false,
            timer: 3000,
        })
    });
        
    @if(session('sweet-success-modal'))
        swalWithBootstrapButtons.fire({
            icon: 'success',
            title: "<h2 class='text-sm font-semibold'>"+'{{ session('sweet-success-modal') }}'+"</h2>",
            padding: '1em',
            width: 320,
            showConfirmButton: false,
            timer: 3000,
        })
    @endif

    @if(session('sweet-error-modal'))
        swalWithBootstrapButtons.fire({
            icon: 'error',
            title: "<h2 class='text-sm font-semibold'>"+'{{ session('sweet-error-modal') }}'+"</h2>",
            padding: '1em',
            width: 320,
            showConfirmButton: false,
            timer: 3000,
        })
    @endif

    @if(session('sweet-success-toast'))
        swalWithBootstrapButtons.fire({
            position: 'top-end',
            icon: 'success',
            title: "<h2 class='text-sm font-semibold'>"+'{{ session('sweet-success-toast') }}'+"</h2>",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            toast: true,
        })
    @endif

    @if(session('sweet-error-toast'))
        swalWithBootstrapButtons.fire({
            position: 'top-end',
            icon: 'error',
            title: "<h2 class='text-sm font-semibold'>"+'{{ session('sweet-error-modal') }}'+"</h2>",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            toast: true,
        })
    @endif
    

    window.addEventListener('sweet-delete-modal', function(e){ 
        swalWithBootstrapButtons.fire({
            title: "<h2 class='text-lg font-bold text-gray-500'>"+'Are you sure?'+"</h2>",
            text: "You won't be able to revert this!",
            icon: 'warning',
            width: 380,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('destroy', e.detail.id);
                // swalWithBootstrapButtons.fire({
                //     icon: 'success',
                //     title: "<h2 class='text-sm font-semibold'>"+e.detail.model+' deleted successfully'+"</h2>",
                //     padding: '1em',
                //     width: 320,
                //     showConfirmButton: false,
                //     timer: 3000,
                // })
            }
        })
    });
</script>

