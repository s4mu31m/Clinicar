<?php

require "db.php";
  $clientes = $conn->query("SELECT * FROM info_cliente");
<<<<<<< HEAD
  $car  = $conn->query("SELECT * FROM car");
=======
  $patente  = $conn->query("SELECT * FROM car");
>>>>>>> develop
?>

<?php require "partials/header.php"?>

<div class="container pt-4 p-3" >
  <div class="row">
    

<<<<<<< HEAD
    <?php if ($clientes->rowCount() === 0){ ?>
      <div class="col-md-4 mx-car">
    <div class="card card-body text-center">
      <p>No tienes Clientes registrados aún</p>
      <a href="add.php">Agrega uno!</a>
    </div>
  </div>
    <?php }?>
    <?php foreach($clientes as $cliente){?>
      <div class="col-md-4 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <h3 class="card-title text-capitalize"><?=$cliente["nombre"]?></h3>
            <p class="m-2"><?=$cliente["telefono"]?></p>
            <a href="edit.php?rut=<?=$cliente["rut"]?> "class="btn btn-secondary mb-2">Editar cliente</a>
            <a href="#?rut=<?=$cliente["rut"]?> "class="btn btn-secondary mb-2">Ver mas informacion</a>
            <a href="delete.php?rut=<?=$cliente["rut"]?> " class="btn btn-danger mb-2">Eliminar cliente</a>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css" 
        integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" 
    />
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"
    ></script>

    <!-- Static Content -->
    <link rel="stylesheet"  href="./static/css/index.css" />
    
    <title>Clinicar</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand font-weight-bold" href="#">
            <img class="mr-2" src="./static/img/logo.png" />
            Clinicar
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" rut="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add.php">Agregar Cliente</a>
              </li>
            </ul>
>>>>>>> develop
          </div>
        </div>
      </div>  
    <?php }?> 

<<<<<<< HEAD
  </div>  
</div>
=======
            <?php if ($clientes->rowCount() === 0){ ?>
              <div class="col-md-4 mx-car">
            <div class="card card-body text-center">
              <p>No tienes Clientes registrados aún</p>
              <a href="add.php">Agrega uno!</a>
            </div>
          </div>
            <?php }?>
            <?php foreach($clientes as $cliente){ foreach($patente as $patentes){?>
              <div class="col-md-4 mb-3">
                <div class="card text-center">
                  <div class="card-body">
                    <h3 class="card-title text-capitalize"><?=$cliente["nombre"]?></h3>
                    <p class="m-2"><?=$cliente["car"], " : ",$patentes["Patente"]?></p>

                    <p class="m-2"><?=$cliente["telefono"]?></p>
                    <a href="edit.php?rut=<?=$cliente["rut"]?> "class="btn btn-secondary mb-2">Editar cliente</a>
                    <a href="#?rut=<?=$cliente["rut"]?> "class="btn btn-secondary mb-2">Ver mas informacion</a>
                    <a href="delete.php?rut=<?=$cliente["rut"]?> " class="btn btn-danger mb-2">Eliminar cliente</a>
                  </div>
                </div>
              </div>  
            <?php }}?> 
>>>>>>> develop

<?php require "partials/footer.php"?>
