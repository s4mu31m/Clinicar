<?php

$mysqli = new mysqli('localhost','root','100199','clinicar');

if($mysqli-> connect_errno)
{
	echo 'Fall� la conexi�n'. $mysqli->connect_error;
	die();

}