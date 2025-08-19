<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>
<div class="container">
    <br>
    <h1 class="text-center text-wheat" style="color: wheat;">Productos en el carrito</h1>
    <?php if (!empty($_SESSION['CARRITO'])) { ?>
        <div class="table-responsive">
            <table class="table table-light table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Porcentaje alcohol</th>
                        <th class="text-center">Volumen</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                        <tr>
                            <td class="text-center"><?php echo $producto['TIPO'] ?></td>
                            <td class="text-center"><?php echo $producto['PORCENTAJE'] ?></td>
                            <td class="text-center"><?php echo $producto['VOLUMEN'] ?></td>
                            <td class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                            <td class="text-center">$<?php echo $producto['PRECIO'] ?></td>
                            <td class="text-center">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2);  ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                                    <button class="btn btn-danger btn-sm" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                    <?php } ?>
                    <tr>
                        <td colspan="5" class="text-right">
                            <h3>Total</h3>
                        </td>
                        <td class="text-right">
                            <h3><?php echo number_format($total, 2) ?></h3>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <form action="pagar.php" method="post">
                                <div class="alert alert-success">
                                    <div class="form-group">
                                        <label for="nombre">Datos del comprador:</label>
                                        <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Ingrese su nombre" required>
                                        <input id="apellido" name="apellido" class="form-control" type="text" placeholder="Ingrese su primer apellido" required>
                                        <input id="CodigoP" name="CodigoP" class="form-control" type="text" placeholder="Ingrese su Código Postal" required>
                                        <input id="email" name="email" class="form-control" type="email" placeholder="Ingrese su correo" required>
                                        <input id="telefono" name="telefono" class="form-control" type="text" placeholder="Ingrese su teléfono" required>
                                        <input id="Direccion" name="Direccion" class="form-control" type="text" placeholder="Ingrese su dirección" required>
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted">
                                        Los productos se enviarán al anterior registro
                                    </small>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">Proceder a pagar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="alert alert-success">
            Ingrese productos al carrito
        </div>
    <?php } ?>
    <a href="catalogo1.php"><img src="img/deshacer.png" alt="Botón de Pagar" width="50" height="50"></a>
    <br>
</div>
<br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>