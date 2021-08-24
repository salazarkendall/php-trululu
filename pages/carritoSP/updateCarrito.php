<?php

include '../../conexion.php';

$idCarrito = $_GET['idCarrito'];
$cantidad = $_GET['cantidad'];

$updateCarrito= oci_parse($conn, "begin UPDATE_CARRITO($idCarrito, $cantidad); end;");

oci_execute($updateCarrito);

?>