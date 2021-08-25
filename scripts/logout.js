$("#logout").click(function () {
    Swal.fire({
        icon: 'warning',
        title: 'Cerrar Sesión?',
        showCancelButton: true,
        confirmButtonColor: '#DC143C',
        confirmButtonText: `Cerrar`,
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "../pages/usuarioSP/logout.php",
                success: function (data) {
                    setTimeout(Swal.fire({
                        icon: 'info',
                        title: 'Cerrando Sesión',
                        text: 'Espere unos segundos...',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        timer: 2000,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getHtmlContainer()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }), 2000);
                    setTimeout(function () {
                        window.location = '../index.php';
                    }, 2000);
                },
            });
        }
    });
});
