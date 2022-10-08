<?php

require "db.php";

<<<<<<< HEAD
$id = $_GET["rut"];

$statement = $conn->prepare("SELECT * FROM info_cliente WHERE rut = :id");
=======
$id = $_GET["Rut"];

$statement = $conn->prepare("SELECT * FROM info_cliente WHERE Rut = :id");
>>>>>>> develop
$statement->execute([":id" => $id]);

if($statement->rowCount()== 0){
  http_response_code(404);
  echo("HTTP 404 NOT FOUND");
  return;
}

<<<<<<< HEAD
$conn->prepare("DELETE FROM info_cliente WHERE rut = :id")->execute([":id" => $id]);
=======
$conn->prepare("DELETE FROM info_cliente WHERE Rut = :id")->execute([":id" => $id]);
>>>>>>> develop

header("Location: index.php");
