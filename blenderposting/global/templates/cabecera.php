
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Blenderposting </title>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href ="index.php"> Blenderposting </a>

        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Catalogo <span class="sr-only"></span></a>
                </li>


               <li class="nav-item active">
                    <a class="nav-link" href="mostrarCarrito.php"> Carrito(<?php 
                    echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                    ?>)  </a>
                </li>


                <li class="nav-item active">
                    <a class="nav-link" href="añadir.php">  Añadir Articulos
                    <title>   Añadir y Borrar Productos      </title>


                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="Remover.php">  Remover Articulos
                    <title>         </title>


                    </a>
                </li>




            </ul>
        </div>
    </nav>

    <br/>
    <br/>

    <div class = "container">