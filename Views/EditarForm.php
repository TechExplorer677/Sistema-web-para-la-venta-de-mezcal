<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar producto</title>
    <link rel="stylesheet" href="styloseditar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .info {
        background-color: white;
        color: red;
        font-weight: 600;
        padding: 5px;
        border-radius: 5px;
        display: none;
        /* Ocultar el mensaje por defecto */
    }
</style>
<script>
    window.onload = function() {
        var inputs = document.querySelectorAll('input'); // Seleccionar todos los campos de entrada

        inputs.forEach(function(input) {
            input.addEventListener('focus', function() {
                var info = this.parentNode.querySelector('.info'); // Obtener el mensaje de ayuda
                if (info) {
                    info.style.display = 'block'; // Mostrar el mensaje cuando el campo está en foco
                }
            });

            input.addEventListener('blur', function() {
                var info = this.parentNode.querySelector('.info'); // Obtener el mensaje de ayuda
                if (info) {
                    info.style.display = 'none'; // Ocultar el mensaje cuando el campo pierde el foco
                }
            });
        });
    };
</script>

<body>
    <br>
    <form class="container" action="../CRUD/EditarDatos.php" method="POST" enctype="multipart/form-data">
        <h1 class="text-center" style="background-color: black; color: white">Editar productos</h1>
        <br>
        <?php
        include_once('conexion.php');
        $sql = "SELECT * FROM producto WHERE Id_producto=" . $_REQUEST['Id'];
        $resultado = $conexion->query($sql);

        $row = $resultado->fetch_assoc();
        ?>
        <input type="Hidden" class="form-control" name="Id" value="<?php echo $row['Id_producto'] ?>">
        <!--Traer datos de opcion multiple-->
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text" REQUIRED class="form-control" name="MarcaP" value="<?php echo $row['Marca_producto'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cantidad</label>
                    <div class="info">Solo se permiten números</div>
                    <input type="text" REQUIRED class="form-control" name="cantidadP" value="<?php echo $row['Cantidad_existentes'] ?>" pattern="[0-9]+">
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de elaboración (año-mes-dia)</label>
                    <div class="info">Ingresar la fecha con el formato YYYY-MM-DD (Año-Mes-Día)</div>
                    <input type="text" REQUIRED class="form-control" name="fechaP" value="<?php echo $row['año_elaboracion'] ?>" pattern="\d{4}-\d{2}-\d{2}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Porcentaje de alcohol</label>
                    <div class="info">Solo se permiten números entre 1 y 100 seguido de '%'</div>
                    <input type="text" REQUIRED class="form-control" name="porcentajeP" value="<?php echo $row['porcentaje_alcohol'] ?>" pattern="\d+(\.\d+)?%">
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen Actual</label>
                    <img height="120px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" /><br>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Tipo de mezcal</label>
                    <select class="form-select" name="tipoP" REQUIRED>
                        <option value="" selected>--Seleccionar Tipo de mezcal--</option>
                        <?php
                        include("conexion.php");
                        $sql1 = "SELECT * FROM categoria WHERE idCategoria=" . $row['categoriaId'];
                        $resultado1 = $conexion->query($sql1);
                        $row1 = $resultado1->fetch_assoc();
                        echo "<option selected value='" . $row1['idCategoria'] . "'>" . $row1['tipo'] . "</option>";
                        $sql2 = "SELECT * FROM categoria";
                        $resultado2 = $conexion->query($sql2);
                        while ($fila = $resultado2->fetch_array()) {
                            echo "<option value='" . $fila['idCategoria'] . "'>" . $fila['tipo'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Volumen</label>
                    <div class="info">Solo se permiten números seguidos de ml o lt</div>
                    <input type="text" REQUIRED class="form-control" name="volumenP" value="<?php echo $row['volumen'] ?>" pattern="\d+(\.\d+)?(ml|lt)">
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <div class="info">Solo se permiten numeros enteros o numeros con 2 decimales positivos</div>
                    <input type="text" REQUIRED class="form-control" name="precio" value="<?php echo $row['precio_producto'] ?>" pattern="\d+(?:\.\d{1,2})?">
                    </>
                    <div class="mb-3">
                        <label class="form-label">Insertar imagen</label>
                        <input type="file" REQUIRED class="form-control" name="Imagen" />

                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger"><img src="../img/caja.png" alt="Botón de regresar" width="50" height="50">Guardar</button>
                <a href="inventario.php" class="btn btn-dark"><img src="../img/deshacer.png" alt="Botón de regresar" width="50" height="50">Regresar</a>
            </div>
            <br>
    </form>
</body>

</html>