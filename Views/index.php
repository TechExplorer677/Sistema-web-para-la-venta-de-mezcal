<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventario</title>
    <link rel="stylesheet" href="stylos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilos para hacer la tabla responsiva */
        @media (max-width: 767px) {
            .table-responsive {
                overflow-x: auto;
            }
        }
        .input-busqueda {
            max-width: 250px; /* Ajusta el ancho máximo según sea necesario */
        }
    </style>
</head>
<body>
     
    <br>
    <div class="container">
        <h1 class="text-center" style="background-color: black; color: white">Inventario de productos</h1>
    </div>
    <br>
   
    
    <div class="container table-responsive">
     <div class="container-fluid">
        <form class="d-flex">
            <input class="form-control me-2 light-table-filter input-busqueda" data-table="table_id" type="text" placeholder="Buscar producto" style="max-height: 40px;">
        </form>
    </div>
    <br>
        <table class="table table-bordered table_id">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Año Elaboracion</th>
                    <th scope="col">Porcentaje de alcohol</th>
                    <th scope="col">Tipo de mezcal</th>
                    <th scope="col">Volumen</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("conexion.php");

                $sql = $conexion -> query("SELECT * FROM producto 
                INNER JOIN categoria ON producto.categoriaId = categoria.idCategoria");

                while($resultado = $sql->fetch_assoc()){
                ?>
                <tr>
                    <th scope="row"><?php echo $resultado['Id_producto']?></th>
                    <th scope="row"><?php echo $resultado['Marca_producto']?></th>
                    <th scope="row"><?php echo $resultado['Cantidad_existentes']?></th>
                    <th scope="row"><?php echo $resultado['año_elaboracion']?></th>
                    <th scope="row"><?php echo $resultado['porcentaje_alcohol']?></th>
                    <th scope="row"><?php echo $resultado['tipo']?></th>
                    <th scope="row"><?php echo $resultado['volumen']?></th>
                    <th scope="row"><?php echo $resultado['precio_producto']?></th>
                    <th ><img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($resultado['imagen']);?>"/></th>
                    <th>
                        <a href="EditarForm.php?Id=<?php echo $resultado['Id_producto']?>" class="btn btn-warning">Editar</a>
                        <br>
                        <a href="../CRUD/EliminarDatos.php?Id=<?php echo $resultado['Id_producto']?>" class="btn btn-danger">Eliminar</a>
                    </th>

                </tr>
                <?php
                }
                ?>  
            </tbody>
        </table>
        <div class="container">
            <a href="agregar.php" class="btn btn-success">Agregar producto</a>
            <a href="../principal.php" class="btn btn-dark">Regresar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="buscador.js"></script>
</body>
</html>
