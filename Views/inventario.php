<?php
session_start();
if (!isset($_SESSION['Usuario']) || $_SESSION['Role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="stylosinventario.css">
    <style>
        th,
        td {
            padding: 0.4rem !important;
        }

        body>div {
            box-shadow: 10px 10px 8px #888888;
            border: 2px solid black;
            border-radius: 10px;
        }
    </style>
    <title>Inventario</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Inventario de productos</h1>
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <thead class="table-dark">
                <th>Id</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Año Elaboracion</th>
                <th>Porcentaje de alcohol</th>
                <th>Tipo de mezcal</th>
                <th>Volumen</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                <?php
                require("conexion.php");

$sql = $conexion->query("SELECT * FROM producto 
                INNER JOIN categoria ON producto.categoriaId = categoria.idCategoria");

while ($resultado = $sql->fetch_assoc()) {
    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $resultado['Id_producto'] ?>
                        </th>
                        <th scope="row">
                            <?php echo $resultado['Marca_producto'] ?>
                        </th>
                        <th scope="row">
                            <?php echo $resultado['Cantidad_existentes'] ?>
                        </th>
                        <th scope="row">
                            <?php echo $resultado['año_elaboracion'] ?>
                        </th>
                        <th scope="row">
                            <?php echo $resultado['porcentaje_alcohol'] ?>
                        </th>
                        <th scope="row">
                            <?php echo $resultado['tipo'] ?>
                        </th>
                        <th scope="row">
                            <?php echo $resultado['volumen'] ?>
                        </th>
                        <th scope="row">$
                            <?php echo $resultado['precio_producto'] ?>
                        </th>
                        <th><img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($resultado['imagen']); ?>" /></th>
                        <th>
                            
                            <a href="EditarForm.php?Id=<?php echo $resultado['Id_producto'] ?>" class="btn btn-warning" title="Editar registro"><i class="fas fa-edit"></i></a>
                        </th>
                        <th>
                            <a href="../CRUD/EliminarDatos.php?Id=<?php echo $resultado['Id_producto'] ?>" class="btn btn-danger" title="Eliminar registro">
                                                        <i class="fas fa-trash-alt"></i></a>
            
                        </th>

                    </tr>
                <?php
}
?>
            </tbody>
        </table>
        <div class="container">
            <a href="agregar.php" class="btn btn-success"><img src="../img/agregar-archivo.png" alt="Botón de regresar" width="50" height="50">Agregar producto</a>
            <a href="../principal.php" class="btn btn-dark"><img src="../img/deshacer.png" alt="Botón de regresar" width="50" height="50">Regresar</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ datos",
                    info: "Mostrando del dato _START_ al _END_ de un total de _TOTAL_ datos",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 400,
                lengthMenu: [
                    [2, 5, 10, 15, 20, 25, -1],
                    [2, 5, 10, 15, 20, 25, "All"]
                ],
            });
        });
    </script>
</body>

</html>