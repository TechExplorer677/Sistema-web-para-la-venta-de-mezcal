<?php
session_start();
$mensaje = "";
$VOLUME = "";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':

            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje .= "Ok ID correcto" . $ID;
            } else {
                $mensaje .= "ID incorrecto";
                break;
            }

            if (is_string(openssl_decrypt($_POST['tipo'], COD, KEY))) {
                $TIPO = openssl_decrypt($_POST['tipo'], COD, KEY);
                $mensaje .= "Ok TIPO correcto" . $TIPO;
            } else {
                $mensaje .= "TIPO incorrecto";
                break;
            }

            if (is_string(openssl_decrypt($_POST['porcentaje'], COD, KEY))) {
                $PORCENTAJE = openssl_decrypt($_POST['porcentaje'], COD, KEY);
                $mensaje .= "Ok POR correcto" . $PORCENTAJE;
            } else {
                $mensaje .= "POR incorrecto";
                break;
            }

            if (is_string(openssl_decrypt($_POST['volumen'], COD, KEY))) {
                $VOLUME = openssl_decrypt($_POST['volumen'], COD, KEY);
                $mensaje .= "Ok volumen correcto" . $VOLUME;
            } else {
                $mensaje .= "volumen incorrecto";
                break;
            }

            if (is_string(openssl_decrypt($_POST['Precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['Precio'], COD, KEY);
                $mensaje .= "Ok PRE correcto" . $PRECIO;
            } else {
                $mensaje .= "PRE incorrecto";
                break;
            }

            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $mensaje .= "Ok CANT correcto" . $CANTIDAD;
            } else {
                $mensaje .= "CANT incorrecto";
                break;
            }

            $producto = array(
                'ID' => $ID,
                'TIPO' => $TIPO,
                'PORCENTAJE' => $PORCENTAJE,
                'VOLUMEN' => $VOLUME,
                'PRECIO' => $PRECIO,
                'CANTIDAD' => $CANTIDAD
            );

            if (!isset($_SESSION['CARRITO'])) {
                $_SESSION['CARRITO'][0] = $producto;
                
            } else {
                $productoEnCarrito = false;

                foreach ($_SESSION['CARRITO'] as $indice => $productoCarrito) {
                    if ($productoCarrito['ID'] == $ID) {
                        $_SESSION['CARRITO'][$indice]['CANTIDAD'] += $CANTIDAD;
                        $productoEnCarrito = true;
                        break;
                    }
                }

                if (!$productoEnCarrito) {
                    $_SESSION['CARRITO'][] = $producto;
                }
            }

           // $mensaje = print_r($_SESSION['CARRITO'], true);

            // Redirigir después de procesar el formulario para evitar reenvíos en recarga
            header('Location: catalogo1.php');
            
            exit;
            $mensaje = "Producto agregado al carrito";
            break;
            case 'Eliminar':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script>alert('Elemento borrado');</script>";
                    }
                }
            } else {
                $mensaje .= "ID incorrecto";
                break;
            }
                break;
    }
}
