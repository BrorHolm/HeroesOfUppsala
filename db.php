<?php

	//Detta är inloggningsuppgifterna till databasen, som läggs i respektive variabler.
	$username = "dbtrain_332";
	$password = "iyhoxh";
	$servername = "dbtrain.im.uu.se";

	//Här skapas kontakt till databasen. Kontakten läggs i varibeln $connection.
	$connection = mysqli_connect($servername, $username, $password, "dbtrain_332");

	//Kollar att kontakten fungerar.
	if ($connection->connect_error) 
	{
		die("Connection failed: " . $connection->connect_error);
	} 
		
		function doQuery($connection, $sql){
		
			$result = $connection->query($sql);
			
			if($result == true){
				return $result;
			}
			else{
				return false;
			}
		}
?>