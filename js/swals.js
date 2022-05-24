$('#ReaPedido').click(function(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        showConfirmButton: false,
        text: '¡Ocurrió un problema!',
        footer: '<a href="checkout.php"><strong> ¡ Inicie Sesión para Comprar ! </strong></a>'
      })
});

