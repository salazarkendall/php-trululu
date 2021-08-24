<head>
    <link href="../styles/catalogo.css" rel="stylesheet" />
    <link href="/trululu/images/logo-trululu-store.png" type="image" rel="shortcut icon" />
</head>

<?php
// include '../scripts/procedures.php';
// include '../components/validator.php';
include '../pages/catalogoSP/getProductos.php';
include '../components/header.php';
$i = 0;
?>

<body>

    <!-- Header y saludo -->
    <header class="bg-dark py-5 header_bg-image">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Tienda Trululu <i class="bi bi-emoji-smile"></i></h1>
                <p class="lead fw-normal text-white-50 mb-0">Encuentra todos nuestros productos aquí</p>
            </div>
        </div>
    </header>

    <section class="py-5 product-section" id="seccionProductos">
        <div class="container px-4 px-lg-5 mt-4">
            <h1 class="text-center mt-5 main-title">Explore nuestros productos</h1>
            <hr>
            <div class="row gx-4 gx-lg-5 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 mt-5 justify-content-center">
                <?php
                $data = get_products_random($conn);
                while (($row = oci_fetch_array($data, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    $i = $i + 1;
                    $productoNombre = $row['NOMBRE'];
                    $productoPrecio = $row['PRECIO'];
                    $productoID = $row['ID_PRODUCTO'];
                    $productoImagen = $row['URL_IMAGEN'];
                    $productoDescripcion = $row['DESCRIPCION'];
                    $btnCarrito = '<button data-id="' . $productoID . '" type="button" class="btnAdd"
                                        onclick="addCart(\'' . $productoNombre . '\')">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>';
                    echo "<div class='product-card mb-5'>
                            <div class='product-tumb'>
                                <img src='$productoImagen' alt=''>
                            </div>
                            <div class='product-details'>
                                <h4><a id='productName$i' href='#'>$productoNombre</a></h4>
                                <p>$productoDescripcion</p>
                                <div class='product-bottom-details'>
                                <div class='product-price'>₡$productoPrecio</div><div class='product-links'>
                                    $btnCarrito
                                </div>
                                </div>
                            </div>
                        </div>";
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    include '../components/footer.php';
    ?>
    <script src="../scripts/carritoSP.js"></script>
    <script src="../scripts/carritoSA.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>