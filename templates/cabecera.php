<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="stiloscatalogo.css">
    <style>
        body {
            background: url(img/inteligencia1.png) no-repeat center;
            background-size: cover;
        }

        .badge {
            display: inline-block;
            padding: 0.5em 1em;
            font-size: 0.75em;
            font-weight: bold;
            color: white;
            background-color: #007bff;
            border-radius: 0.25rem;
            text-decoration: none;
            /* Remove underline from link */
        }

        .badge-success {
            background-color: #28a745;
            /* Green color for success */
        }

        #paypal-button-container .paypal-button {
            width: 100% !important;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .navbar-nav.mr-auto {
            flex-grow: 1;
        }

        .nav-carrito {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand"><img src="img/logo.jpg" alt="Botón de regresar" width="60" height="60"></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="principal.php">Inicio<span class="sr-only"></span></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active nav-carrito">
                    <a class="nav-link" href="VerCarrito.php"><img src="img/carrito.png" alt="carrito" width="60" height="60">
                        (<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div class="container">