$('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function (event) {
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function () {
                    var $target = $(target);
                    $target.focus();
                        return false;
                    } else {
                    };
                });
            }
        }
    });

$(".btnAdd").click(function () {
    var id = $(this).attr("data-id");
    $.ajax({
        type: "GET",
        url: "../pages/carritoSP/insertCarrito.php",
        data: {
            ajaxid: id,
        },
        success: function (data) {
            $("#display_rows").html(data);
        },
    });
});

$(".btnMinus").click(function () {
    var cantidad = $(this).attr("data-filter");
    if (cantidad == 1) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se puede reducir la cantidad',
            confirmButtonText: `Aceptar`
        });
    } else {
        var id = $(this).attr("data-id");
        $.ajax({ 
            type: "GET",
            url: "../pages/carritoSP/updateCarrito.php",
            data: {
                idCarrito: id,
                cantidad: -1
            },
            success: function (data) {
                setTimeout(function () { location.reload(); }, 700);
            },
        });
    }
});

$(".btnPlus").click(function () {
    var cantidad = $(this).attr("data-filter");
    if (cantidad == 5) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Límite de productos alcanzado!',
            confirmButtonText: `Aceptar`
        });
    } else {
        var id = $(this).attr("data-id");
        $.ajax({
            type: "GET",
            url: "../pages/carritoSP/updateCarrito.php",
            data: {
                idCarrito: id,
                cantidad: 1
            },
            success: function (data) {
                setTimeout(function () { location.reload(); }, 700);
            },
        });
    }
});

$(".btnDelete").click(function () {
    Swal.fire({
        icon: 'warning',
        title: 'Atención',
        text: 'Desea eliminar el producto?',
        showCancelButton: true,
        confirmButtonColor: '#DC143C',
        confirmButtonText: `Eliminar`,
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr("data-id");
            $.ajax({
                type: "GET",
                url: "../pages/carritoSP/deleteCarrito.php",
                data: {
                    idCarrito: id
                },
                success: function (data) {
                    setTimeout(Swal.fire({
                        icon: 'error',
                        title: 'Eliminando Producto',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        timer: 1000,
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
                    }), 1000);
                    setTimeout(function () { location.reload(); }, 1000);
                },
            });
        }
    });
});
