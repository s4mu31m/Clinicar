<?php

  require "db.php";
  $error = null;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["rut"]) || empty($_POST["nombre"]) || empty($_POST["patente"]) || empty($_POST["telefono"])){
      $error = "Por favor rellena todos los datos";
      
    }else if(strlen($_POST["telefono"])< 9){
      $error = "El numero de Teléfono debe contener al menos 9 carácteres";

    }else{

      $rut      = $_POST["rut"];
      $nombre   = $_POST["nombre"];
  
      $telefono = $_POST["telefono"];
      
      $statement = $conn->prepare("INSERT INTO info_cliente (rut, nombre, telefono) VALUES (:rut, :nombre, :telefono)");
      
      $statement->bindParam(":rut",      $_POST["rut"]);
      $statement->bindParam(":nombre",   $_POST["nombre"]);
      $statement->bindParam(":telefono", $_POST["telefono"]);
      $statement->execute();

      
      header("Location: index.php");
    }
  }
?>

<?php require "partials/header.php"?>

        <div class="container pt-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">Agrega Auto de Cliente</div>
                <div class="card-body">
                  <?php if ($error) { ?>
                      <p class="text-danger">
                      <?= $error ?>
                      </p>
                        
                  <?php } ?>
                  <form method="POST" action="add.php">
                  <div class="mb-3 row">
                      <label for="patente" class="col-md-4 col-form-label text-md-end">Patente</label>
        
                      <div class="col-md-6">
                        <input id="patente" type="text" class="form-control" name="patente" placeholder = "Ingrese la patente" required autocomplete="rut" autofocus>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="car" class="col-md-4 col-form-label text-md-end">Modelo</label>
        
                      <div class="col-md-6">
                        <input id="car" type="text" class="form-control" name="car" placeholder = "Ingrese el Modelo del Vehiculo" required autocomplete="car" autofocus>
                      </div>
                    </div>

                    <div class="mb-3 row">
                    <label for="patente" class="col-md-4 col-form-label text-md-end">Patente</label>

                    <div class="col-md-6">
                        <input id="patente" type="text" class="form-control" name="patente" placeholder = "Ingrese la patente del Auto" required autocomplete="car" autofocus>
                      </div>
                    </div>
                    
                    <div class="mb-3 row">
                      <label for="año" class="col-md-4 col-form-label text-md-end">Año</label>
        
                      <div class="col-md-6">
                        <input id="año" type="text" class="form-control" name="año" placeholder = "Ingrese el año del Vehiculo" required autocomplete="año" autofocus>
                      </div>
                    </div>
                    
                    <div class="mb-3 row">
                      <label for="aceite" class="col-md-4 col-form-label text-md-end">Aceite</label>
        
                      <div class="col-md-6">
                        <input id="aceite" type="text" class="form-control" name="aceite" placeholder = "Ingrese el nivel de aceite del Vehiculo" required autocomplete="aceite" autofocus>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="año" class="col-md-4 col-form-label text-md-end">Año</label>
        
                      <div class="col-md-6">
                        <input id="año" type="text" class="form-control" name="año" placeholder = "Ingrese el año del Vehiculo" required autocomplete="año" autofocus>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="año" class="col-md-4 col-form-label text-md-end">Año</label>
        
                      <div class="col-md-6">
                        <input id="año" type="text" class="form-control" name="año" placeholder = "Ingrese el año del Vehiculo" required autocomplete="año" autofocus>
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

