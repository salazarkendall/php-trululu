<head>
    <title>Carrito - Tienda Trululu</title>
    <link href="../images/logo-trululu-store.png" type="image" rel="shortcut icon" />
    <link href="../styles/carrito.css" rel="stylesheet" />
</head>

<?php
include '../components/header.php';
$idUsuario = $_SESSION['idUsuario'];
include '../conexion.php';

$total = 0;
$montoTotal = 0;

$curs = oci_new_cursor($conn);
$sp = oci_parse($conn, "begin GET_CARRITOS(:CM, :ID_USUARIO); end;");
oci_bind_by_name($sp, ":CM", $curs, -1, OCI_B_CURSOR);
oci_bind_by_name($sp, ":ID_USUARIO", $idUsuario, 32);
oci_execute($sp);
oci_execute($curs);

$curs2 = oci_new_cursor($conn);
$sp2 = oci_parse($conn, "begin GET_CARRITOS(:CM, :ID_USUARIO); end;");
oci_bind_by_name($sp2, ":CM", $curs2, -1, OCI_B_CURSOR);
oci_bind_by_name($sp2, ":ID_USUARIO", $idUsuario, 32);
oci_execute($sp2);
oci_execute($curs2);

?>

<body>
    <?php
    if (($validation = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS))) {
        echo '<div class="container-fluid mb-5 header-top">
            <div class="row">
                <div class="col-md-10 col-11 mx-auto">
                    <div class="row mt-5 gx-4">
                        <!-- Left side -->
                        <div class="col-md-12 col-lg-8 col-10 mx-auto main-cart mb-lg-0 mb-5 shadow">
                            <h2 class="mt-4 ml-2 font-weight-bold">Cantidad de Artículos: </h2>';
        while (($row = oci_fetch_array($curs2, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            $idCarrito = $row['ID_CARRITO'];
            $cantidadCarrito = $row['CANTIDAD'];
            $idUsuario = $row['ID_USUARIO'];
            $idProducto = $row['ID_PRODUCTO'];
            $nombreProducto = $row['NOMBRE'];
            $descripcionProducto = $row['DESCRIPCION'];
            $urlImagen = $row['URL_IMAGEN'];
            $precioProducto = $row['PRECIO'];
            echo '<div class="cart p-4"> 
                                        <div class="row">
                                            <!-- Cart images -->
                                            <div class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center product-img">
                                                <img src="' . $urlImagen . '" class="img-fluid" alt="cart img" />
                                            </div>
                                        <!-- Cart product details -->
                                        <div class="col-md-7 col-11 mx-auto px-4 mt-2">
                                            <div class="row">
                                                <!-- Product name -->
                                                <div class="col-6 card-title">
                                                    <h1 class="mb-4 product-name">' . $nombreProducto . '</h1>
                                                    <p class="mb-5">' . $descripcionProducto . '</p>
                                                    <br><br>
                                                </div>
                                            <!-- Quantity inc dec -->
                                            <div class="col-6">
                                                <ul class="pagination justify-content-end set-quantity">
                                                    <li class="page-item border">
                                                        <button type="button" onclick="minusCart(\'' . $nombreProducto . '\')" 
                                                        data-id="' . $idCarrito . '" data-filter="' . $cantidadCarrito . '" class="page-link btnMinus">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </li>
                                                    <li class="page-item border">
                                                        <input class="page-link itemval" type="text" value="' . $cantidadCarrito . '" disabled />
                                                    </li>
                                                    <li class="page-item border">
                                                        <button type="button" onclick="plusCart(\'' . $nombreProducto . '\')" 
                                                        data-id="' . $idCarrito . '" data-filter="' . $cantidadCarrito . '" class="page-link btnPlus"> 
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <!-- Remove item and price -->
                                    <div class="row">
                                        <div class="col-8 d-flex justify-content-between remove">
                                            <div class="product-links">
                                                <button data-id="' . $idCarrito . '" type="button" class="btnDelete" 
                                                onclick="deleteCart(\'' . $nombreProducto . '\')">
                                                    <i class="fa fa-trash"></i> Eliminar Producto
                                                </button> 
                                            </div>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end price-money">
                                            <h3>₡<span id="itemval">' . $precioProducto . '</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />';
        }
        oci_free_statement($sp);
        oci_free_statement($curs);
        echo '</div>
                    <!-- Right side -->
                    <div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5" >
                        <div class="rigth_side p-3 shadow bg-white" style="position: fixed; width:27vw">
                            <h2 class="product_name mb-4">Desgloce Factura:</h2>';

        $getCarritos = oci_parse($conn, "begin GET_CARRITOS(:CM, :ID_USUARIO); end;");
        $curs = oci_new_cursor($conn);

        oci_bind_by_name($getCarritos, ":CM", $curs, -1, OCI_B_CURSOR);
        oci_bind_by_name($getCarritos, ":ID_USUARIO", $idUsuario, 32);

        oci_execute($getCarritos);
        oci_execute($curs);

        while (($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            $idCarrito = $row['ID_CARRITO'];
            $cantidadCarrito = $row['CANTIDAD'];
            $idUsuario = $row['ID_USUARIO'];
            $idProducto = $row['ID_PRODUCTO'];
            $nombreProducto = $row['NOMBRE'];
            $descripcionProducto = $row['DESCRIPCION'];
            $urlImagen = $row['URL_IMAGEN'];
            $precioProducto = $row['PRECIO'];

            $total = $precioProducto * $cantidadCarrito;
            $montoTotal = $montoTotal + $total;

            echo "<div class='price-indiv d-flex justify-content-between'>
                                        <p>$nombreProducto</p>
                                        <p>+ ₡<span>$total</span></p>
                                    </div>";
        }
        echo '<hr />
                            <div class="total-amt d-flex justify-content-between font-weight-bold">
                                <p>Monto Total</p>';

        $_SESSION['total'] = $montoTotal;
        echo '<p>₡<span id="total_cart_amt">' . $montoTotal . '</span></p>';
        echo '</div>
                            <a href="checkout.php">
                                <button class="btn btn-primary text-uppercase">Comprar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    } else {
        echo '<div id="outer" class="container">
                <div id="inner">
                    <h1 class="text-center mt-3">Oops!</h1>
                    <p class="text-center">No has agregado ningún artículo</p>
                    <a class="d-flex justify-content-center fs" href="inicio.php">Empecemos!</a>
                </div>
            </div>';
    }
    ?>

    <!-- Add sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../scripts/carritoSA.js"></script>

    <script src="../scripts/carritoSP.js"></script>

</body>

<?php
oci_close($conn);
?>