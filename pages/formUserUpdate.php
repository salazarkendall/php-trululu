<head>
    <link href="../styles/formsButtons.css" rel="stylesheet" />
    <link href="../styles/checkout.css" rel="stylesheet" />
    <link href="../images/logo-trululu-store.png" type="image" rel="shortcut icon" />
</head>

<?php
include "../components/header.php";
include '../conexion.php';
include './usuarioSP/getTipos.php';
include './usuarioSP/getUser.php';

$idParametro = $_GET['q'];

$dataUsuario = get_usuario($conn, $idParametro);

$infoUsuario = oci_fetch_array($dataUsuario, OCI_ASSOC + OCI_RETURN_NULLS);
$idUsuario = $infoUsuario['ID_USUARIO'];
$nombreUsuario = $infoUsuario['NOMBRE'];
$primerApellido = $infoUsuario['APELLIDO1'];
$segundoApellido = $infoUsuario['APELLIDO2'];
$emailUsuario = $infoUsuario['EMAIL'];
$passwordUsuario = $infoUsuario['PW'];
$tipoUsuario = $infoUsuario['ID_ROL'];

?>

<body>
    <main class="page payment-page header-top">
        <section class="payment-form dark">
            <div class="container">

                <div class="block-heading">
                    <h2>Agregar Usuario</h2>
                </div>

                <!-- Begin Form -->
                <form action="" method="post">
                    <div class="card-details">
                        <h3 class="title text-uppercase">Actualizar Usuario</h3>
                        <div class="row">
                            <?php
                            echo "<div class='form-group col-sm-6'>
                                        <label id='idVal'>ID Usuario</label>
                                        <input id='idUsuario' name='idUsuario' disabled type='text' class='form-control' placeholder='Nombre' value='$idUsuario' required>
                                    </div>
                                    <div class='form-group col-sm-6'>
                                        <label id='nomVal'>Nombre</label>
                                        <input id='nombre' name='nombre' maxlength='20' type='text' class='form-control' placeholder='Nombre' value='$nombreUsuario' required>
                                    </div>
                                    <div class='form-group col-sm-6'>
                                        <label id='appVal'>Primer Apellido</label>
                                        <input id='apellido1' name='apellido1' maxlength='20' type='text' class='form-control' placeholder='Primer Apellido' value='$primerApellido' required>
                                    </div>
                                    <div class='form-group col-sm-6'>
                                        <label id='app2Val'>Segundo Apellido</label>
                                        <input id='apellido2' name='apellido2' maxlength='20' type='text' class='form-control' placeholder='Segundo Apellido' value='$segundoApellido' required>
                                    </div>
                                    <div class='form-group col-sm-6'>
                                        <label id='emailVal'>Correo Electrónico</label>
                                        <input id='email' name='email' type='mail' maxlength='80' class='form-control' placeholder='Correo Electrónico' value='$emailUsuario' required>
                                    </div>
                                    <div class='form-group col-sm-6'>
                                        <label id='passVal'>Contraseña</label>
                                        <input id='password' name='password' type='password' maxlength='15' class='form-control' placeholder='Contraseña' value='$passwordUsuario' required>
                                    </div>"

                            ?>

                            <div class="form-group col-sm-6">
                                <label id="tipoVal">Proveedor</label>
                                <select id="selectTipo" name="selectTipo" class="form-control">
                                    <?php
                                    $dataCategorias = get_roles($conn);
                                    while (($row = oci_fetch_array($dataCategorias, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                                        if ($row['ID_ROL'] == $tipoUsuario) {
                                            echo "<option value=" . $row["ID_ROL"] . " selected>" . $row["TIPO"] . "</option>";
                                        } else {
                                            echo "<option value=" . $row["ID_ROL"] . ">" . $row["TIPO"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="container">

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <a href="tablaUsuarios.php"><button id="cancelar" type="button" class="btn btn-block ">Cancelar</button></a>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button id="btnUpdate" type="submit" class="btn btn-block">Actualizar usuario</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <?php
    include '../components/footer.php';
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../scripts/formUsuario.js"></script>

</body>
