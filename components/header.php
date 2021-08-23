<?php
session_start();

// Redirecciona si el usuario no esta conectado
if (is_null($_SESSION['idUsuario'])) {
    header('Location: ../index.php ');
}

$idUsuario = $_SESSION['idUsuario'];
$nombreUsuario = $_SESSION['nombreUsuario'];
$apellidoUsuario = $_SESSION['apellidoUsuario'];
$idRol = $_SESSION['idRol'];

include '../conexion.php';
include '../pages/catalogoSP/getAllMarcas.php';

$curs = oci_new_cursor($conn);
$getCarritoCount = oci_parse($conn, "begin GET_CARRITO_COUNT(:CM, :ID_USUARIO); end;");
oci_bind_by_name($getCarritoCount, ":CM", $curs, -1, OCI_B_CURSOR);
oci_bind_by_name($getCarritoCount, ":ID_USUARIO", $idUsuario, 32);
oci_execute($getCarritoCount);
oci_execute($curs);

$count = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS);
$cantidadProductos = $count['COUNT(*)'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Tienda de caramelos Trululu" />
    <meta name="author" content="" />
    <title>Trululu</title>
    <link href="../styles/styles.css" rel="stylesheet" />
    <link href="../styles/custom.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top ">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand">
                <img src="https://res.cloudinary.com/kndx99/image/upload/v1627049507/trululu-project/main-logo_psxlaq.png" alt="main-logo" style="height: 25px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/trululu/pages/inicio.php">
                            <i class="bi bi-house-fill"></i>
                            Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/trululu/pages/contactenos.php">
                            <i class="bi bi-info-circle-fill"></i>
                            Contáctenos
                        </a>
                    </li>
                    <!-- Dropdown de marcas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Marcas</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/trululu/pages/inicio.php">Todas las marcas</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <?php
                            $data = get_all_marcas($conn);
                            while (($row = oci_fetch_array($data, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                                $idMarca = $row['ID_CATEGORIA'];
                                $productoMarca = $row['TIPO'];
                                echo "<li><a class='dropdown-item' href='/trululu/pages/catalogo.php?q=$idMarca'>$productoMarca</a></li>";
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <!-- Boton del carrito -->
                <button class="btn btn-outline-trululu" type="submit">
                    <a href="../pages/carrito.php">
                    <i class="bi-cart-fill me-1"></i>
                    Carrito
                </a>
                    <span class="badge bg-trululu text-white ms-1 rounded-pill">
                        <?php echo $cantidadProductos ?>
                    </span>
                </button>
            </div>
        </div>
    </nav>

    <script src="/trululu/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>