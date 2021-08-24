<?php
session_start();

include '../../conexion.php';

$curs = oci_new_cursor($conn);

$emailLogin = $_GET['emailLogin'];
$passwordLogin = $_GET['passwordLogin']; 

$login = oci_parse($conn, "begin LOGIN(:CM, :EMAIL, :PASSWORD); end;");

oci_bind_by_name($login, ":CM", $curs, -1, OCI_B_CURSOR);
oci_bind_by_name($login, ":EMAIL", $emailLogin, -1);
oci_bind_by_name($login, ":PASSWORD", $passwordLogin, -1);

oci_execute($login);
oci_execute($curs);

$row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS);

$_SESSION['idUsuario'] = $row['ID_USUARIO'];
$_SESSION['nombreUsuario'] = $row['NOMBRE'];
$_SESSION['apellidoUsuario'] = $row['APELLIDO1'];
$_SESSION['idRol'] = $row['ID_ROL'];