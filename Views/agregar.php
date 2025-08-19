<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>
    <link rel="stylesheet" href="stylosagregar.css">
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
    <div class="container">
        <form action="../CRUD/insertarDatos.php" method="POST" enctype="multipart/form-data">
            <h1 class="bg-black p-2 text-white text-center">Agregar producto</h1>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="">Marca</label>
                        <select class="form-select" name="MarcaP" REQUIRED>
                            <option value="" selected>--Seleccionar marca--</option>
                            <option value="El mentado">El mentado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <div class="info">Solo se permiten números</div>
                        <input type="text" REQUIRED class="form-control" name="cantidadP" pattern="[0-9]+">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de elaboración</label>
                        <div class="info">Ingresar la fecha con el formato YYYY-MM-DD (Año-Mes-Día)</div>
                        <input type="text" REQUIRED class="form-control" name="fechaP" pattern="\d{4}-\d{2}-\d{2}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Porcentaje de alcohol</label>
                        <div class="info">Solo se permiten números entre 1 y 100 seguido de '%'</div>
                        <input type="text" REQUIRED class="form-control" name="porcentajeP" pattern="\d+(\.\d+)?%">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="">Tipo de mezcal</label>
                        <select class="form-select" name="tipoP" REQUIRED>
                            <option value="" selected disabled>--Seleccionar Tipo de mezcal--</option>
                            <?php
                            include("conexion.php");
                            $sql = $conexion->query("SELECT * FROM categoria");
                            while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='" . $resultado['idCategoria'] . "'>" . $resultado['tipo'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Volumen</label>
                        <div class="info">Solo se permiten números seguidos de ml o lt</div>
                        <input type="text" REQUIRED class="form-control" name="volumenP" pattern="\d+(\.\d+)?(ml|lt)">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <div class="info">Solo se permiten numeros enteros o numeros con 2 decimales positivos</div>
                        <input type="text" REQUIRED class="form-control" name="precio" pattern="\d+(?:\.\d{1,2})?">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Insertar imagen</label>
                        <input type="file" REQUIRED class="form-control" name="Imagen" />
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-danger"><img src="../img/caja.png" alt="Botón de regresar" width="50" height="50">Guardar</button>
                <a href="inventario.php" class="btn btn-dark"><img src="../img/deshacer.png" alt="Botón de regresar" width="50" height="50">Regresar</a>
            </div>
            <br>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>