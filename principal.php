<?php
session_start();
if (!isset($_SESSION['Usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="stylepaginaprincipal.css">
    <title>Mezcaleria</title>
</head>

<style>
    .inicio .content h1,
    .inicio .content h2 {
        color: #fff;
        margin: 10px 0;
        /* Añade un margen entre los elementos */
    }

    .inicio .content h2 {
        font-weight: bold;
        color: #fff;
    }

    .inicio .content h1 {
        font-weight: bold;
    }

    .productos .caja-contenedor .caja p {
        font-size: 1.3rem;
        color: #CCCCCC;
        ;
        padding: 1rem 0;
        font-weight: 500;
    }
</style>

<body>

    <nav class="ocultarSeccionNav" id="nav">
        <!-- Tipo 1 -->
        <div class="header">

            <h2>Mezcaleria el mentado</h2>
            <img id="mostrarOcultarNav" src="img/menu.png" alt="Icono de comedor" loading="lazy" width="200px" height="300px">
        </div>
        <!-- Tipo 2 -->
        <div class="seccionNav">
            <div class="visible">
                <img src="img/casa.png" alt="Icono Home" loading="lazy" width="200px" height="300px">
                <!--<p>Inicio</p>-->
                <a href="#inicio">Inicio</a>
            </div>
        </div>
        <!-- Tipo 3 -->
        <div class="seccionNav" id="seccionNav">
            <div class="visible">
                <img src="img/bienes (4).png" alt="Icono de Productos" loading="lazy" width="200px" height="300px">
                <!--<p>Productos</p>-->
                <a href="catalogo1.php">Productos</a>
            </div>
        </div>
        <div class="seccionNav" id="seccionNav">
            <div class="visible">
                <img src="img/equipo.png" alt="Icono nosotros" loading="lazy" width="200px" height="300px">
                <!-- <p>Nosotros</p>-->
                <a href="#nosotros">Nosotros</a>

            </div>
        </div>
        <div class="seccionNav">
            <div class="visible">
                <img src="img/comunicar.png" alt="Icono comunicar" loading="lazy" width="800px" height="800px">
                <!--<p>Inicio</p>-->
                <a href="#contacto">Contacto</a>
            </div>
        </div>
        <?php if ($_SESSION['Role'] == 'admin') : ?>
            <div class="seccionNav">
                <div class="visible">
                    <img src="img/inventario (2).png" alt="Icono Inventario" loading="lazy" width="800px" height="800px">
                    <a href="Views/inventario.php">Inventario</a>
                </div>
            </div>
        <?php endif; ?>
        <div class="seccionNav">
            <div class="visible">
                <img src="img/cerrar-sesion.png" alt="Icono cerrar-sesion" loading="lazy" width="800px" height="800px">
                <!--<p>Inicio</p>-->
                <a href="Cerrar Sesion.php">Logout</a>
            </div>
        </div>
    </nav>
    <section class="inicio" id="inicio">
        <div class="content">
            <h1 class="animate__animated animate__zoomIn animate-on-scroll" style="animation-duration: 2.5s;">Mezcaleria el mentado</h1>
            <br><br><br><br><br>
            <h2 class="animate__animated animate__zoomIn animate-on-scroll" style="animation-duration: 2.5s;">Tradición desde 1890</h2>
            <br><br><br><br>
            <h2 class="animate__animated animate__zoomIn animate-on-scroll" style="animation-duration: 2.5s;">Quinta generación de productores de Mezcal. Pasión por el agave.
            </h2>
        </div>
        <div class="imagenbotella">
            <img src="img/botella1.png" alt="">
        </div>
    </section>

    <section class="productos" id="productos">
        <h1 class="heading animate__animated animate-on-scroll" style="animation-duration: 2.5s;">Productos</h1>
        <div class="caja-contenedor">
            <div class="caja">
                <h3 class="animate__animated animate-on-scroll" style="animation-duration: 2.5s;">Explora Nuestra Selección de Mezcales Artesanales</h3>
                <p class="animate__animated animate-on-scroll" style="animation-duration: 2.5s;">
                    Descubre nuestra exclusiva selección de mezcales artesanales, elaborados con la más alta calidad y tradición.
                </p>
                <div class="producto-imagenes">
                    <img src="img/imagen el mentado.jpg" alt="Producto 1" class="animate__animated animate-on-scroll" style="animation-duration: 2.5s; width: 150px; height: 180px;">

                    <img src="img/mentendado3.jpg" alt="producto 2" class="animate__animated animate-on-scroll" style="animation-duration: 2.5s; width: 150px; height: 180px;">
                </div>
                <a href="catalogo1.php" class="btn btn-success animate__animated animate-on-scroll" style="animation-duration: 4s;"><img src="img/negocios-en-linea.png" alt="tienda" style="width: 50px; height: 50px;" class="animate__animatedanimate-on-scroll" style="animation-duration: 4s;"> Catalogo de productos</a>
            </div>
        </div>
    </section>

    <section class="nosotros" id="nosotros">
        <h1 class="heading animate__animated animate-on-scroll" style="animation-duration: 2.5s;">Sobre nosotros</h1>
        <div class="content">
            <h2 class="animate__animated animate-on-scroll" style="animation-duration: 2.5s;">Descubre Nuestros Orígenes y Nuestra Pasión</h2>
            <p class="animate__animated animate-on-scroll" style="animation-duration: 2.5s;">De las vinatas más antiguas de Etúcuaro, Michoacán, nace: Mezcal El Mentado fue fundada en 1890,
                desde entonces ha mantenido las tradiciones centenarias de destilación. Con un firme compromiso con la
                producción de mezcal artesanal de la más alta calidad, nos enorgullece ser una empresa responsable, dedicada
                a la sostenibilidad y al bienestar de las comunidades locales.</p>

        </div>
        <img src="img/Empresa nosotros.jpg" alt="imagen nosotros" class="animate__animated animate-on-scroll" style="animation-duration: 2.5s; width: 160px; height: 180px;">
    </section>

    <section class="contacto" id="contacto">
        <h1 class="heading animate__animated animate-on-scroll" style="animation-duration: 2.5s;">Contacto</h1>
        <div class="content">
            <div class="columna1">
                <h4 class="animate__animated animate-on-scroll" style="animation-duration: 2.5s;">¿Tienes Preguntas? ¡Contáctanos por WhatsApp!</h4>
                <div class="RedesSociales">
                    <a href="https://wa.link/k6bea3" target="_blank">
                        <img src="img/whatsapp.png" alt="Icono de WhatsApp" width="70px" height="70px" class="animate__animated animate-on-scroll" style="animation-duration: 2.5s;">
                    </a>
                </div>
            </div>
            <div class="columna2">
                <h4 class="animate__animated animate-on-scroll" style="animation-duration: 2.5s;">Dirección</h4>
                <div class="direccion">
                    <img src="img/Direccion.jpg" alt="direccion" width="300px" height="350px" class="animate__animated animate-on-scroll" style="animation-duration: 2.5s;">
                </div>
                <div class="texto">
                    <p class="animate__animated animate-on-scroll">San Francisco Etúcuaro, municipio de Madero Michoacán</p>
                </div>
            </div>
        </div>
    </section>
    <div class="footer">
        <div class="caja-mayor">
            <div class="caja1">
                <h3>Nuestros productos</h3>
                <a href="catalogo1.php">Mezcal joven</a>
                <a href="catalogo1.php">Mezcal reposado</a>
                <a href="catalogo1.php">Mezcal doble destilado</a>
                <a href="catalogo1.php">Mezcal doble destilado pechuga</a>
                <a href="catalogo1.php">Mezcal doble destilado ensamble</a>
                <a href="catalogo1.php">Mezcal doble destilado marihuana</a>
            </div>

            <div class="caja2">
                <h3>Buscanos en</h3>
                <i class="fa-brands fa-whatsapp"></i>
                <a href="#contacto">WhatsApp</a>
            </div>
            <div class="caja1">
                <h3>Sobre nosotros</h3>
                <div class="info">

                    <p>Direccion de la empresa: San Francisco Etúcuaro, municipio de Madero Michoacán</p>

                </div>
                <div class="info">

                    <p>Numero de la empresa: 443-402-7488</p>

                </div>
                <div class="info">
                    <img src="img/logo.jpg" alt="" width="100px" height="100px">
                </div>
            </div>
        </div>
        <h1 class="creditos">
            &copy, copyrigh @ 2024 Teresita, Brandon, Abel
        </h1>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Crear un Intersection Observer
            let observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__zoomIn');
                        observer.unobserve(entry.target); // Deja de observar una vez que se ha animado
                    }
                });
            });

            // Obtener todos los elementos a animar
            let elements = document.querySelectorAll('.animate-on-scroll');

            elements.forEach(element => {
                observer.observe(element); // Empezar a observar cada elemento
            });
        });
    </script>
</body>

<script src="app.js"></script>

</html>