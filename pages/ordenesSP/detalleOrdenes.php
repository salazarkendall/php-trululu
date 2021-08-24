<?php
include '../../conexion.php';

$pasar = $_GET['ajaxid'];

$curs2 = oci_new_cursor($conn);
$getDetalleOrden = oci_parse($conn, "begin GET_DETALLE_ORDENES(:CM, $pasar); end;");
oci_bind_by_name($getDetalleOrden, ":CM", $curs2, -1, OCI_B_CURSOR);

oci_execute($getDetalleOrden);
oci_execute($curs2);

while (($row2 = oci_fetch_array($curs2, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
    $idDetalle = $row2['ID_DETALLEORDEN'];
    $urlImagen = $row2['URL_IMAGEN'];
    $precio = $row2['PRECIO'];
    $cantidad = $row2['CANTIDAD'];
    $nombre = $row2['NOMBRE'];
    echo "<tr class='text-center'>
            <th scope='row'>$idDetalle</th>
            <td>$nombre</td>
            <td>$cantidad</td>
            <td>₡$precio</td>
            <td><img src='$urlImagen' width='50' height='50' /></td>
        </tr>";
}