<?php

  require "db.php";

  $id = $_GET["rut"];

  $statement = $conn->prepare("SELECT * FROM info_cliente WHERE rut = :id LIMIT 1");
  $statement->execute([":id" => $id]);
  




  $cliente = $statement->fetch(PDO ::FETCH_ASSOC);
  $car = $statement->fetch(PDO ::FETCH_ASSOC);

  $error = null;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if (empty($_POST["nombre"]) || empty($_POST["telefono"])){
        $error = "Por favor rellena todos los datos";

      }else if(strlen($_POST["telefono"])< 9){
         $error = "Número de teléfono invalido.";

      }else{

        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        
        $statement = $conn->prepare("UPDATE info_cliente SET nombre = :nombre, telefono = :telefono WHERE rut = :id ");
        $statement->execute ([
          ":id" => $id,
          ":nombre"=> $_POST["nombre"],
          "telefono"=> $_POST["telefono"],
        ]);
        header("Location: index.php");
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta nombre="viewport" content="width=device-width, initial-scale=1.0">
    
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
                <a class="nav-link" href="./index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./add.php">Agregar Cliente</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> 
      <main>
        <div class="container pt-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">Editar Cliente existente</div>
                <div class="card-body">
                  <?php if ($error) { ?>
                      <p class="text-danger">
                      <?= $error ?>
                      </p>
                  <?php } ?>
                  <form method="POST" action="edit.php?rut= <?= $cliente["rut"]?>">
                    <div class="mb-3 row">
                        <label for="rut" class="col-md-4 col-form-label text-md-end">RUT</label>
          
                        <div class="col-md-6">
                          <input Value="<?=$cliente["rut"] ?>" id="rut" type="text" class="form-control" name="rut" placeholder = "Ingrese el rut" required autocomplete="rut" autofocus>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre</label>
          
                        <div class="col-md-6">
                          <input Value="<?=$cliente["nombre"] ?>" id="nombre" type="text" class="form-control" name="nombre" placeholder = "Ingrese el Nombre" required autocomplete="nombre" autofocus>
                        </div>
                      </div>
                      
                      <div class="mb-3 row">
                      <label for="car" class="col-md-4 col-form-label text-md-end">Auto</label>

                      <div class="col-md-6">
                          <input Value="<?=$cliente["car"] ?>"id="car" type="text" class="form-control" name="car" placeholder = "Ingrese el Modelo del Auto" required autocomplete="car" autofocus>
                        </div>
                      </div>

                      <div class="mb-3 row">
                      <label for="patente" class="col-md-4 col-form-label text-md-end">Patente</label>

                      <div class="col-md-6">
                          <input Value="<?=$car["patente"] ?>"id="patente" type="text" class="form-control" name="patente" placeholder = "Ingrese la patente del Auto" required autocomplete="car" autofocus>
                        </div>
                      </div>
                      
                      <div class="mb-3 row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-end">Número de telefono</label>
          
                        <div class="col-md-6">
                          <input Value="<?=$cliente["telefono"] ?>"id="telefono" type="text" class="form-control" name="telefono" placeholder = "Ingrese el Numero de teléfono" required autocomplete="telefono" autofocus>
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
      </main> 
</body>
</html>
