<?php

  require "db.php";
  $error = null;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["rut"]) || empty($_POST["nombre"]) ||  empty($_POST["telefono"])){
      $error = "Por favor rellena todos los datos";
      
    }else if(strlen($_POST["telefono"])< 9){
      $error = "El numero de Teléfono debe contener al menos 9 carácteres";
    }else{
      $statement = $conn->prepare("SELECT * FROM info_cliente WHERE rut = :rut");
      $statement->bindParam(":rut", $_POST["rut"]);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $error = "Este RUT ya está registrado";
      } else {
        $conn
        ->prepare("INSERT INTO info_cliente (rut, nombre, telefono) VALUES (:rut, :nombre, :telefono)")
        ->execute([
          ":rut" => $_POST["rut"],
          ":nombre" => $_POST["nombre"],
          ":telefono" => $_POST["telefono"],
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION["user"] = $user;
        
        header("Location: index.php");
      }


    }
  }
?>

<?php require "partials/header.php"?>

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Agrega un nuevo Cliente</div>
        <div class="card-body">
          <?php if ($error) { ?>
              <p class="text-danger">
              <?= $error ?>
              </p>
                
          <?php } ?>
          <form method="POST" action="add.php">
          <div class="mb-3 row">
              <label for="rut" class="col-md-4 col-form-label text-md-end">RUT</label>

              <div class="col-md-6">
                <input id="rut" type="text" class="form-control" name="rut" placeholder = "Ingrese el rut" required autocomplete="rut" autofocus>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre</label>

              <div class="col-md-6">
                <input id="nombre" type="text" class="form-control" name="nombre" placeholder = "Ingrese el Nombre" required autocomplete="nombre" autofocus>
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="telefono" class="col-md-4 col-form-label text-md-end">Número de telefono</label>

              <div class="col-md-6">
                <input id="telefono" type="text" class="form-control" name="telefono" placeholder = "Ingrese el Numero de teléfono" required autocomplete="telefono" autofocus>
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

