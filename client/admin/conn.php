<?php

$conn = new mysqli('localhost', 'root', '', 'ugc');

if ($conn->connect_error) {
	
	die (" Error cannot connect to server ! ");
	
}

?>