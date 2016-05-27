<?php

	//viktors inloggningsuppgifter, för test lokalt på hans dator
	/*
	$username = "root";
	$password = "";
	$servername = "localhost";
	$dbname = "dbtrain_332";
	*/

	//Detta är inloggningsuppgifterna till databasen, som läggs i respektive variabler.
	$username = "dbtrain_332";
	$password = "iyhoxh";
	$servername = "dbtrain.im.uu.se";
	$dbname = "dbtrain_332";

	//Här skapas kontakt till databasen. Kontakten läggs i varibeln $connection.
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	//Ser till att det som görs med databasen är i UTF8
	$connection->set_charset("utf8");

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