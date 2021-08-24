<?php
session_start();

$idUsuario = $_SESSION['idUsuario'];

include '../../conexion.php';

$numeroTarjeta = strval($_GET['numTarjeta']);
$direccion1 = strval($_GET['dir1']);
$direccion2 = strval($_GET['dir2']);
$telefono = strval($_GET['telefono']);
$total = strval($_SESSION['total']);
// $totalReal = $total * 1.13;
$metodoPago = strval($_GET['metodoPago']);

$insertInfoPago = oci_parse($conn, "begin INSERT_INFOPAGO(:NUM_TARJETA, :DIR_FACTURACION, :DIR_FACTURACION2, :TELEFONO, :TOTAL, :ID_USUARIO, :ID_METODOPAGO); end;");

oci_bind_by_name($insertInfoPago, ":NUM_TARJETA", $numeroTarjeta, -1);
oci_bind_by_name($insertInfoPago, ":DIR_FACTURACION", $direccion1, -1);
oci_bind_by_name($insertInfoPago, ":DIR_FACTURACION2", $direccion2, -1);
oci_bind_by_name($insertInfoPago, ":TELEFONO", $telefono, -1);
oci_bind_by_name($insertInfoPago, ":TOTAL", $total, -1);
oci_bind_by_name($insertInfoPago, ":ID_USUARIO", $idUsuario, -1);
oci_bind_by_name($insertInfoPago, ":ID_METODOPAGO", $metodoPago, -1);

oci_execute($insertInfoPago);
