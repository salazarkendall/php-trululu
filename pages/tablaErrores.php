<head>
    <title>Errores - Trululu</title>
    <link href="../styles/checkout.css" rel="stylesheet" />
    <link href="../images/logo-trululu-store.png" type="image" rel="shortcut icon" />
    <!-- This link reference here is for the table pagination -->
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet'>
    <link href='https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css' rel='stylesheet'>
</head>

<?php
include '../components/header.php';
include '../conexion.php';

$curs = oci_new_cursor($conn);

$getAllErrores = oci_parse($conn, "begin GET_ALL_ERRORES(:CM); end;");

oci_bind_by_name($getAllErrores, ":CM", $curs, -1, OCI_B_CURSOR);

oci_execute($getAllErrores);
oci_execute($curs);
?>

<body>

    <div class="container header-top">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mt-5">
                <h2 class="heading-section">Historial Errores</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table" id="tblHistorial">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Fec. Errores</th>
                                <th>Descripción</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while (($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                                $idError = $row['ID_ERRORES'];
                                $fecError = $row['FEC_ERROR'];
                                $descError = $row['DESCRIPCION'];
                                $nombreUsuario = $row['NOMBRE'];
                                // Printing the values into the table
                                echo '<tr class="text-center">
                                        <th>' . $idError . '</th>
                                        <td scope="row">' . $fecError . '</td>
                                        <td>' . $descError . '</td>
                                        <td>' . $nombreUsuario . '</td>
                                    </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Import the footer.php
    include '../components/footer.php';
    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../scripts/deleteProducto.js"></script>
    <script src="../scripts/historial.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

</body>