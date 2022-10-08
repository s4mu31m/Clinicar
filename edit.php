<?php

  require "db.php";

  $id = $_GET["rut"];

  $statement = $conn->prepare("SELECT * FROM info_cliente WHERE rut = :id LIMIT 1");
  $statement->execute([":id" => $id]);
  


  $cliente = $statement->fetch(PDO ::FETCH_ASSOC);

  $error = null;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if ( empty($_POST["nombre"]) ||  empty($_POST["telefono"])){
      $error = "Por favor rellena todos los datos";
      
    }else if(strlen($_POST["telefono"])< 9){
      $error = "El numero de Teléfono debe contener al menos 9 carácteres";


    }else{



      $nombre   = $_POST["nombre"];
      $telefono = $_POST["telefono"];
        
        $statement = $conn->prepare("UPDATE info_cliente SET  nombre = :nombre, telefono = :telefono WHERE rut = :id ")->execute([":id" => $id]);
        $statement->bindParam(":nombre",   $_POST["nombre"]);
        $statement->bindParam(":telefono", $_POST["telefono"]);
        $statement->execute ();
        header("Location: home.php");

      }
    }
?>

<?php require "partials/header.php"?>

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Editar datos del Cliente</div>
        <div class="card-body">
          <?php if ($error) { ?>
              <p class="text-danger">
              <?= $error ?>
              </p>
          <?php } ?>
          <form method="POST" action="edit.php?rut= <?= $cliente["rut"]?>">

            <div class="mb-3 row">
              <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre</label>

              <div class="col-md-6">
                <input value="<?= $cliente["nombre"]?>" rut="nombre" type="text" class="form-control" name="nombre" required autocomplete="nombre" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="telefono" class="col-md-4 col-form-label text-md-end">Número de telefono</label>

              <div class="col-md-6">
                <input value="<?= $cliente["telefono"]?>" rut="telefono" type="tel" class="form-control" name="telefono" required autocomplete="telefono" autofocus>

              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "partials/footer.php"?>
