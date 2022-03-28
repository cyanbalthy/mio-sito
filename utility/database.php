<?php
$hostname = '172.17.0.2';
$username = 'root';
$password = 'my-secret-pw';
$db = 'create_employee';

$mysqli=new mysqli($hostname,$username,$password,$db)
or die ("<br>Connessione non riuscita " . $mysqli->connect_error . " " . $mysqli->connect_errno);



?>