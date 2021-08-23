<?php
function get_all_marcas($conn)
{
    $curs = oci_new_cursor($conn);
    $query = oci_parse($conn, "begin GET_ALL_CATEGORIAS(:CM); end;");

    oci_bind_by_name($query, ":CM", $curs, -1, OCI_B_CURSOR);

    oci_execute($query);
    oci_execute($curs);

    return $curs;
}
