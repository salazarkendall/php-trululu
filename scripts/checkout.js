/* This .js file is used in checkout.php it's function is to prevent the user from inserting invalid information */

let selectMetodo = document.getElementById('selectMet'); 

const pTarjeta = document.getElementById('tarjetaVal');
let inputTarjeta = document.getElementById('tarjeta');

const pCVC = document.getElementById('cvcVal');
let inputCVC = document.getElementById('cvc');

const pDir1 = document.getElementById('dir1Val');
let inputDir1 = document.getElementById('dir1');

const pDir2 = document.getElementById('dir2Val');
let inputDir2 = document.getElementById('dir2');

const pTel = document.getElementById('telVal');
let inputTel = document.getElementById('tel');

const pCod = document.getElementById('codVal');
let inputCod = document.getElementById('cod');

const btn = document.getElementById('btnBuy');

const reparacionTarjeta = pTarjeta.innerText;
const reparacionCVC = pCVC.innerText;
const reparacionDir1 = pDir1.innerText;
const reparacionDir2 = pDir2.innerText;
const reparacionTel = pTel.innerText;
const reparacionCod = pCod.innerText;

inputTarjeta.addEventListener('change', getValueTarjeta);
inputCVC.addEventListener('change', getValueCVC);
inputDir1.addEventListener('change', getValueDir1);
inputDir2.addEventListener('change', getValueDir2);
inputTel.addEventListener('change', getValueTel);
inputCod.addEventListener('change', getValueCod);

$(document).ready(function () {
    $('#btnBuy').attr('disabled', true);
    $('input').keyup(function () {
        if (inputTarjeta.value.trim().length == 16 && inputCVC.value.trim().length == 3 && inputDir1.value.trim().length >= 5 
            && inputDir2.value.trim().length >= 5 && inputTel.value.trim().length == 8 && inputCod.value.trim().length == 5) {
            $('#btnBuy').attr('disabled', false);
        } else {
            $('#btnBuy').attr('disabled', true);
        }
    });
});

function getValueTarjeta(e) {
    if (e.target.value.trim() == 0) {
        pTarjeta.innerText = reparacionTarjeta;
        let validacion = ' Obligatorio (*)';
        pTarjeta.innerText += validacion;
        pTarjeta.style.color = "RED";
    } else if (e.target.value.trim() != 0) {
        pTarjeta.innerText = reparacionTarjeta;
        pTarjeta.style.color = "GREY";
        let noStartWS = e.target.value.trimStart();
        let withoutWS = noStartWS.replace(/\s/g, '');
        inputTarjeta.value = withoutWS;
        if (inputTarjeta.value.length < 16) {
            pTarjeta.innerText = reparacionTarjeta;
            let validacion = ' Mínimo 16 Caracteres (*)';
            pTarjeta.innerText += validacion;
            pTarjeta.style.color = "RED";
        } else {
            pTarjeta.innerText = reparacionTarjeta;
            let validacion = ' Válido';
            pTarjeta.innerText += validacion;
            pTarjeta.style.color = "GREEN";
        }
    }
}

function getValueCVC(e) {
    if (e.target.value.trim() == 0) {
        pCVC.innerText = reparacionCVC;
        let validacion = ' Obligatorio (*)';
        pCVC.innerText += validacion;
        pCVC.style.color = "RED";
    } else if (e.target.value.trim() != 0) {
        pCVC.innerText = reparacionCVC;
        pCVC.style.color = "GREY";
        let noStartWS = e.target.value.trimStart();
        let withoutWS = noStartWS.replace(/\s/g, '');
        inputCVC.value = withoutWS;
        if (inputCVC.value.length < 3) {
            pCVC.innerText = reparacionCVC;
            let validacion = ' Mínimo 3 Caracteres (*)';
            pCVC.innerText += validacion;
            pCVC.style.color = "RED";
        } else {
            pCVC.innerText = reparacionCVC;
            let validacion = ' Válido';
            pCVC.innerText += validacion;
            pCVC.style.color = "GREEN";
        }
    }
}

function getValueDir1(e) {
    if (e.target.value.trim() == 0) {
        pDir1.innerText = reparacionDir1;
        let validacion = ' Obligatorio (*)';
        pDir1.innerText += validacion;
        pDir1.style.color = "RED";
    } else if (e.target.value.trim() != 0) {
        pDir1.innerText = reparacionDir1;
        pDir1.style.color = "GREY";
        let noStartWS = e.target.value.trimStart();
        let withoutWS = noStartWS.replace(/  +/g, ' ');
        inputDir1.value = withoutWS;
    }
    if (inputDir1.value.length < 5) {
        pDir1.innerText = reparacionDir1;
        let validacion = ' Mínimo 5 Caracteres (*)';
        pDir1.innerText += validacion;
        pDir1.style.color = "RED";
    } else {
        pDir1.innerText = reparacionDir1;
        let validacion = ' Válida';
        pDir1.innerText += validacion;
        pDir1.style.color = "GREEN";
    }
}

function getValueDir2(e) {
    if (e.target.value.trim() == 0) {
        pDir2.innerText = reparacionDir2;
        let validacion = ' Obligatorio (*)';
        pDir2.innerText += validacion;
        pDir2.style.color = "RED";
    } else if (e.target.value.trim() != 0) {
        pDir2.innerText = reparacionDir2;
        pDir2.style.color = "GREY";
        let noStartWS = e.target.value.trimStart();
        let withoutWS = noStartWS.replace(/  +/g, ' ');
        inputDir2.value = withoutWS;
    }

    if (inputDir2.value.length < 5) {
        pDir2.innerText = reparacionDir2;
        let validacion = ' Mínimo 5 Caracteres (*)';
        pDir2.innerText += validacion;
        pDir2.style.color = "RED";
    } else {
        pDir2.innerText = reparacionDir2;
        let validacion = ' Válida';
        pDir2.innerText += validacion;
        pDir2.style.color = "GREEN";
    }
}

function getValueTel(e) {
    if (e.target.value.trim() == 0) {
        pTel.innerText = reparacionTel;
        let validacion = ' Obligatorio (*)';
        pTel.innerText += validacion;
        pTel.style.color = "RED";
    } else if (e.target.value.trim() != 0) {
        pTel.innerText = reparacionTel;
        pTel.style.color = "GREY";
        let noStartWS = e.target.value.trimStart();
        let withoutWS = noStartWS.replace(/\s/g, '');
        inputTel.value = withoutWS;

        if (inputTel.value.length < 8) {
            pTel.innerText = reparacionTel;
            let validacion = ' Mínimo 8 Caracteres (*)';
            pTel.innerText += validacion;
            pTel.style.color = "RED";
        } else {
            pTel.innerText = reparacionTel;
            let validacion = ' Válido';
            pTel.innerText += validacion;
            pTel.style.color = "GREEN";
        }
    }
}

function getValueCod(e) {
    if (e.target.value.trim() == 0) {
        pCod.innerText = reparacionCod;
        let validacion = ' Obligatorio (*)';
        pCod.innerText += validacion;
        pCod.style.color = "RED";
    } else if (e.target.value.trim() != 0) {
        pCod.innerText = reparacionCod;
        pCod.style.color = "GREY";
        let noStartWS = e.target.value.trimStart();
        let withoutWS = noStartWS.replace(/\s/g, '');
        inputCod.value = withoutWS;

        if (inputCod.value.length < 5) {
            pCod.innerText = reparacionCod;
            let validacion = ' Mínimo 5 Caracteres (*)';
            pCod.innerText += validacion;
            pCod.style.color = "RED";
        } else {
            pCod.innerText = reparacionCod;
            let validacion = ' Válido';
            pCod.innerText += validacion;
            pCod.style.color = "GREEN";
        }
    }
}

$("#btnBuy").click(function () {
    Swal.fire({
        icon: 'info',
        title: 'Atención',
        text: '¿Desea confirmar la compra?',
        showCancelButton: true,
        confirmButtonColor: '#00913f',
        cancelButtonColor: '#DC143C',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "../pages/infoPagoSP/insertInfoPago.php",
                data: {
                    metodoPago: selectMetodo.value,
                    numTarjeta: inputTarjeta.value,
                    dir1: inputDir1.value,
                    dir2: inputDir2.value,
                    telefono: inputTel.value,
                },
                success: function (data) {
                    setTimeout(Swal.fire({
                        icon: 'success',
                        title: 'Compra Realizada',
                        text: 'Espere unos segundos...',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        timer: 3000,
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
                    }), 3000);
                    setTimeout(function () {
                        window.location = 'confirmacion.php';
                    }, 3000);
                },
            });
        }
    });
});