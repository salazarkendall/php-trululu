<?php

include '../../conexion.php';

$emailLogin = $_GET['p_email'];
$emailPassword = $_GET['p_passwrd'];

$curs = oci_new_cursor($conn);

$login = oci_parse($conn, "begin LOGIN(:CM, :email, :passwrd); end;");

oci_bind_by_name($login, ":CM", $curs, -1, OCI_B_CURSOR);
oci_bind_by_name($login, ":email", $emailLogin, 32);
oci_bind_by_name($login, ":passwrd", $emailPassword, 32);

oci_execute($login);
oci_execute($curs);

$row = oci_fetch_row($curs); 

if ($row  == false) {
    echo 'Email o contraseña no validos';
}
