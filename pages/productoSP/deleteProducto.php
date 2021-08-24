<?php

include '../../conexion.php';

$idProducto = $_GET['idProducto'];

$deleteProducto = oci_parse($conn, "begin DELETE_PRODUCTO(:ID); end;");

oci_bind_by_name($deleteProducto, ":ID", $idProducto, -1);

oci_execute($deleteProducto);

?>