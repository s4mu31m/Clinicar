<?php

require "db.php";
  $clientes = $conn->query("SELECT * FROM info_cliente");
?>

<?php require "partials/header.php"?>

<div class="container pt-4 p-3" >
  <div class="row">
    

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
            <a href="add_car.php?id=<?=$cliente["id"]?> "class="btn btn-secondary mb-2">Agregar vehiculo asociado</a>
            <a href="delete.php?rut=<?=$cliente["rut"]?> " class="btn btn-danger mb-2">Eliminar cliente</a>
          </div>
        </div>
      </div>  
    <?php }?> 

  </div>  
</div>

<?php require "partials/footer.php"?>
