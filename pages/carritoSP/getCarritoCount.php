<?php
function get_carrito_count($conn, $idUsuario)
{
    $curs = oci_new_cursor($conn);
    $getCarritoCount = oci_parse($conn, "begin GET_CARRITO_COUNT(:CM, :ID_USUARIO); end;");
    oci_bind_by_name($getCarritoCount, ":CM", $curs, -1, OCI_B_CURSOR);
    oci_bind_by_name($getCarritoCount, ":ID_USUARIO", $idUsuario, 32);
    oci_execute($getCarritoCount);
    oci_execute($curs);

    $count = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS);
    return $count['COUNT(*)'];
}
