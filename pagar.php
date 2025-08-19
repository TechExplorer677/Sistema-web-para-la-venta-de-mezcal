<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
<?php
if ($_POST) {
    $total = 0;
    $SID = session_id();
    $Nombre = $_POST['nombre'];
    $Apellido = $_POST['apellido'];
    $CodigoP = $_POST['CodigoP'];
    $Correo = $_POST['email'];
    $telefono = $_POST['telefono'];
    $Direccion = $_POST['Direccion'];

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
    }
    $sentencia = $pdo->prepare("INSERT INTO `pedido`
    (`Id_Pedido`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Nombre`, `Apellido`, `CodigoPostal`, `Correo`, `Telefono`, `Direccion`, `Total`, `Status`) 
    VALUES ('',:ClaveTransaccion,'',NOW(),:Nombre,:Apellido,:CodigoPostal,:Correo,:Telefono,:Direccion,:Total,'pendiente')");

    $sentencia->bindParam(":ClaveTransaccion", $SID);
    $sentencia->bindParam(":Nombre", $Nombre);
    $sentencia->bindParam(":Apellido", $Apellido);
    $sentencia->bindParam(":CodigoPostal", $CodigoP);
    $sentencia->bindParam(":Correo", $Correo);
    $sentencia->bindParam(":Telefono", $telefono);
    $sentencia->bindParam(":Direccion", $Direccion);
    $sentencia->bindParam(":Total", $total);
    $sentencia->execute();
    $idVenta = $pdo->lastInsertId();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {

        $sentencia = $pdo->prepare("INSERT INTO `consta` 
        (`Id_consta`, `Id_pedido`, `Id_producto`, `PrecioUnitario`, `Cantidad`) 
        VALUES ('',:Id_pedido,:Id_producto,:PrecioUnitario,:Cantidad);");
        $sentencia->bindParam(":Id_pedido", $idVenta);
        $sentencia->bindParam(":Id_producto", $producto['ID']);
        $sentencia->bindParam(":PrecioUnitario", $producto['PRECIO']);
        $sentencia->bindParam(":Cantidad", $producto['CANTIDAD']);
        $sentencia->execute();
    }
}
?>
<br><br>
<script src="https://www.paypal.com/sdk/js?client-id=AXllci6whsmGFPJ5ENIfYWWyeCaYef-T7Kwh2GuqDYThmgRVxYWUp8UzIphsaR-TGo4bL8FTiauHuJRs&currency=MXN" data-sdk-integration-source="button-factory"></script>

<div class="jumbotron text-center">
    <h1 class="display-4">!Paso final¡</h1>
    <hr class="my-4">
    <p class="lead">Total a pagar con paypal:</p>
    <h4>$<?php echo number_format($total, 2); ?></h4>
    <div id="smart-button-container" >
        <div style="text-align: center;">
            <div id="paypal-button-container"></div>
        </div>
    </div>
    <p>Una vez realizado el pago se comenzara con el envio de los producto</p>
    <script>
        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'pill',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'pay',
                    height: 50

                },

                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '<?php echo $total ?>'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(detalles) {
                        alert("Pago realizado")
                    });
                },
                onCancel: function(data) {
                    alert("Pago cancelado")
                },

                onError: function(err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();
    </script>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>