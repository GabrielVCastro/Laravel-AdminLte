
function perguntaComprarRifa(rota =  false)
{

    Swal.fire({
        title: 'Pague via pix!',
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((resultado) => {
        if(resultado){
            window.location.href = rota
        }
    })
}


function perguntaCancelarRifa(rota =  false)
{

    Swal.fire({
    title: 'Deseja Cancelar Sua Rifa?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: 'middle',
                icon: 'success',
                title: 'Rifa Cancelada Com Sucesso',
                showConfirmButton: false,
                timer: 1500
              })
              setTimeout(function(){
                window.location.href = rota
              },1550)

        }
    })
}
