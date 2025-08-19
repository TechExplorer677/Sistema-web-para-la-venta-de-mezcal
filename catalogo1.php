<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
<br>
<?php if ($mensaje != "") { ?>
    <div class="alert alert-success" role="alert">
        <?php echo ($mensaje); ?>
        <a href="VerCarrito.php" class="badge badge-success">Ver carrito</a>
    </div>
<?php } ?>
<h1 style="color: wheat;">Catalogo de productos</h1>
<div class="row">
    <?php

    $sentencia = $pdo->prepare("SELECT producto.*, categoria.tipo 
                        FROM producto 
                        INNER JOIN categoria ON producto.categoriaId = categoria.idCategoria");
    $sentencia->execute();
    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <?php foreach ($listaProductos as $producto) { ?>

        <div class="col-auto">
            <div class="card">
                <img height="200" title="Titulo producto" alt="Titulo" class="card-img-top" src=" data:image/jpg;base64,<?php echo base64_encode($producto['imagen']); ?>">

                <div class="card-body">
                    <h4>Tipo:</h4>
                    <h4><?php echo $producto['tipo']; ?></h4>
                    <h4>Porcentaje Alcohol:</h4>
                    <h4> <?php echo $producto['porcentaje_alcohol']; ?></h4>

                    <h4>Volumen: <?php echo $producto['volumen']; ?></h4>
                    <h4>Precio: $<?php echo $producto['precio_producto']; ?></h4>

                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['Id_producto'], COD, KEY); ?>">

                        <input type="hidden" name="tipo" id="tipo" value="<?php echo openssl_encrypt($producto['tipo'], COD, KEY); ?>">

                        <input type="hidden" name="porcentaje" id="porcentaje" value="<?php echo openssl_encrypt($producto['porcentaje_alcohol'], COD, KEY); ?>">

                        <input type="hidden" name="volumen" id="volumen" value="<?php echo openssl_encrypt($producto['volumen'], COD, KEY); ?>">


                        <input type="hidden" name="Precio" id="Precio" value="<?php echo openssl_encrypt($producto['precio_producto'], COD, KEY); ?>">

                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">

                        <button class="btn btn-success" name="btnAccion" type="submit" value="Agregar"><img src="img/comercio.png" alt="Botón de regresar" width="25" height="25">Agregar al carrito</button>

                    </form>

                </div>

            </div>
            <br>
        </div>
    <?php  }
    ?>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>