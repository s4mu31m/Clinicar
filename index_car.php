<?php

require "db.php";
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: index.php");
  return;
}

var_dump($_SESSION['user']);
die();

  $vehiculo = $conn->query("SELECT * FROM vehiculo WHERE  = user_id = {$_SESSION['user']['id']}");
?>

<?php require "partials/header.php"?>

<div class="container pt-4 p-3" >
  <div class="row">
    

    <?php if ($vehiculo->rowCount() === 0){ ?>
      <div class="col-md-4 mx-car">
    <div class="card card-body text-center">
      <p>No tienes vehiculos registrados aún</p>
      <a href="add.php">Agrega uno!</a>
    </div>
  </div>
    <?php }?>
    <?php foreach($vehiculo as $auto){?>
      <div class="col-md-4 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <h3 class="card-title text-capitalize"><?=$auto["patente"]?></h3>
            <p class="m-2"><?=$auto["marca"]?></p>
            <a href="edit.php?rut=<?=$auto["rut"]?> "class="btn btn-secondary mb-2">Editar cliente</a>
            <a href="#?rut=<?=$auto["id_cliente"]?> "class="btn btn-secondary mb-2">Ver mas informacion</a>
            <a href="delete.php?rut=<?=$auto["rut"]?> " class="btn btn-danger mb-2">Eliminar cliente</a>
          </div>
        </div>
      </div>  
    <?php }?> 

  </div>  
</div>

<?php require "partials/footer.php"?>
