<?php

$mysqli = new mysqli('localhost','root','100199','clinicar');

if($mysqli-> connect_errno)
{
	echo 'Falló la conexión'. $mysqli->connect_error;
	die();

}
