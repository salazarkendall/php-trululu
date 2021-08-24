<?php

include '../../conexion.php';

$idCarrito = $_GET['idCarrito'];

$deleteCarrito= oci_parse($conn, "begin DELETE_CARRITO($idCarrito); end;");

oci_execute($deleteCarrito);
 
?>