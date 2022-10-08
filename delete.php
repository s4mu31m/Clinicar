<?php

require "db.php";

$id = $_GET["Rut"];

$statement = $conn->prepare("SELECT * FROM info_cliente WHERE Rut = :id");
$statement->execute([":id" => $id]);

if($statement->rowCount()== 0){
  http_response_code(404);
  echo("HTTP 404 NOT FOUND");
  return;
}

$conn->prepare("DELETE FROM info_cliente WHERE Rut = :id")->execute([":id" => $id]);

header("Location: index.php");
