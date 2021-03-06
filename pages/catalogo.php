<head>
    <link href="../styles/catalogo.css" rel="stylesheet" />
    <link href="/trululu/images/logo-trululu-store.png" type="image" rel="shortcut icon" />
</head>

<?php
include '../pages/catalogoSP/getProductos.php';
include '../pages/catalogoSP/getLowestPrice.php';
include '../pages/catalogoSP/getMarca.php';
include '../components/header.php';

// Este es el determinante de mostrar la informacion de cada marca
$categoria = $_GET['q'];
?>

<body>
    <?php
    $dataCategoria = get_lowest_price($conn, $categoria);
    $infoCategoria = oci_fetch_array($dataCategoria, OCI_ASSOC + OCI_RETURN_NULLS);
    $lowestPrice = $infoCategoria['PRECIO'];
    $tipo = $infoCategoria['TIPO'];


    $info = get_marca($conn, $categoria);
    $imagenCategoria = oci_fetch_array($info, OCI_ASSOC + OCI_RETURN_NULLS);
    $imagen = $imagenCategoria['IMAGEN_CATEGORIA'];

    echo "
    <h3 class='text-center header-top subtitle></h3>
    <div class='row justify-content-center header-top'>
        <div class='text-center'>
            <img class='img-fluid' src='$imagen'/>
        </div>
    </div>
    <h3 class='text-center mt-3 main-subtitle'>Precios desde: ₡$lowestPrice</h3>
    ";
    ?>

    <!-- Product Secction -->
    <section id="productos" class="py-5" style="background-color: #f9f9fa; padding-top: 1rem">
        <div class="container px-4 px-lg-5 mt-4">
            <h1 class="text-center mt-5">Explore nuestros Productos</h1>
            <hr>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 mt-5 justify-content-center">
                <?php
                $data = get_products($conn, $categoria);
                while (($row = oci_fetch_array($data, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    $id = $row['ID_PRODUCTO'];
                    $nombre = $row['NOMBRE'];
                    $descripcion = $row['DESCRIPCION'];
                    $url = $row['URL_IMAGEN'];
                    $precio = $row['PRECIO'];
                    echo "<div class='product-card mb-5'>
                            <div class='product-tumb'>
                                <img src='$url' alt='$nombre'>
                            </div>
                            <div class='product-details'>
                                <h4><a id='productName$id' href='#'>$nombre</a></h4>
                                <p>$descripcion</p>
                                <div class='product-bottom-details'>
                                <div class='product-price'>₡$precio</div>";
                    echo '<div class="product-links">
                                        <button data-id="' . $id . '" type="button" class="btnAdd" 
                                        onclick="addCart(\'' . $nombre . '\')">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <?php
    include '../components/footer.php';
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../scripts/carritoSA.js"></script>

    <script src="../scripts/carritoSP.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>