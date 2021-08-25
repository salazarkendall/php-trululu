$('.btnDelete').click(function () {
	Swal.fire({
		icon: 'warning',
		title: 'Atención',
		text: '¿Desea eliminar usuario?',
		showCancelButton: true,
		confirmButtonColor: '#DC143C',
		confirmButtonText: `Eliminar`,
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.isConfirmed) {
			var id = $(this).attr('data-id');
			console.log(id);
			$.ajax({
				type: 'GET',
				url: '../pages/usuarioSP/deleteUsuario.php',
				data: {
					idUsuario: id,
				},
				success: function (data) {
					setTimeout(
						Swal.fire({
							icon: 'info',
							title: 'Usuario Eliminado Correctamente',
							text: 'Redirigiendo... espere unos segundos.',
							showCancelButton: false,
							showConfirmButton: false,
							allowEscapeKey: false,
							allowOutsideClick: false,
							timer: 3000,
							didOpen: () => {
								Swal.showLoading();
								timerInterval = setInterval(() => {
									const content = Swal.getHtmlContainer();
									if (content) {
										const b = content.querySelector('b');
										if (b) {
											b.textContent = Swal.getTimerLeft();
										}
									}
								}, 100);
							},
							willClose: () => {
								clearInterval(timerInterval);
							},
						}),
						3000
					);
					setTimeout(function () {
						window.location = 'tablaUsuarios.php';
					}, 3000);
				},
			});
		}
	});
});
