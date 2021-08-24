<?php

include '../../conexion.php';

$nombreUsuario = $_GET['nombre'];
$apellido1Usuario = $_GET['apellido1'];
$apellido2Usuario = $_GET['apellido2'];
$correoUsuario = $_GET['correo'];
$passwordUsuario = $_GET['passwrd'];
$tipoUsuario = $_GET['tipo'];

$insertUsuario = oci_parse($conn, "begin INSERT_USUARIO(:NOMBRE, :APELLIDO1, :APELLIDO2, :CORREO, :PW, :TIPO ); end;");

oci_bind_by_name($insertUsuario, ":NOMBRE", $nombreUsuario, -1);
oci_bind_by_name($insertUsuario, ":APELLIDO1", $apellido1Usuario, -1);
oci_bind_by_name($insertUsuario, ":APELLIDO2", $apellido2Usuario, -1);
oci_bind_by_name($insertUsuario, ":CORREO", $correoUsuario, -1);
oci_bind_by_name($insertUsuario, ":PW", $passwordUsuario, -1);
oci_bind_by_name($insertUsuario, ":TIPO", $tipoUsuario, -1);

oci_execute($insertUsuario);
