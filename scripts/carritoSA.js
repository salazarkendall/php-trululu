function addCart(nombre) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: `${nombre} agregado al carrito`,
        showConfirmButton: false,
        timer: 2000,
        toast: true,
    });
}

function minusCart(nombre) { 
    Swal.fire({
        // bottom-start, bottom-end, top-start
        position: "top-end",
        icon: "error",
        title: `Se eliminó un/a ${nombre} del carrito`,
        showConfirmButton: false,
        timer: 2000,
        toast: true,
    });
}

function plusCart(nombre) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: `Se agregó un/a ${nombre} al carrito`,
        showConfirmButton: false,
        timer: 2000,
        toast: true,
    });
}

$("#productName1").on("click", function(e) {
    e.preventDefault();
    var url = $(this).attr("href");
    $.get(url, function() {
        // Success
    });
});

$("#productName2").on("click", function(e) {
    e.preventDefault();
    var url = $(this).attr("href");
    $.get(url, function() {
        // Success
    });
});

$("#productName3").on("click", function(e) {
    e.preventDefault();
    var url = $(this).attr("href");
    $.get(url, function() {
        // Success
    });
});

$("#productName4").on("click", function(e) {
    e.preventDefault();
    var url = $(this).attr("href");
    $.get(url, function() {
        // Success
    });
});

$("#productName5").on("click", function(e) {
    e.preventDefault();
    var url = $(this).attr("href");
    $.get(url, function() {
        // Success
    });
});

$("#productName6").on("click", function(e) {
    e.preventDefault();
    var url = $(this).attr("href");
    $.get(url, function() {
        // Success
    });
});