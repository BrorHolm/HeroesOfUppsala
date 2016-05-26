
<?php

	//inkludera databasen. Nu finns connection i variabeln "$connection"
	include("db.php");
	
	//Vi gör queryn säker genom att använda mysqli_real_escape_string.
	$reg_password = mysqli_real_escape_string($connection, $_POST['password']); 
	$reg_email = mysqli_real_escape_string($connection, $_POST['email']);

	registerUser($connection, $reg_password, $reg_email);
	
	function registerUser($connection, $reg_password, $reg_email) //kom ihåg att inkl $connection
	{
		//http://www.w3schools.com/php/php_mysql_insert.asp
		//nedanstående är hittat här

		//Vi lägger vårt skapade salt i $salt genom att anropa funktionen createUniqueSalt.
		$salt = createSalt();
		
		//Skapar hashat lösenord, det vill säga lägger ihop salt och lösenord. Eftersom sha1 användes i funktionen
		//createSalt måste samma användas här. Detta för att saltet ska bli rätt. 
		$hashed_password = sha1($salt.$reg_password);
		
		$emailQuery = "SELECT UserMail FROM User WHERE UserMail = '$reg_email'";

		$resultEmail = $connection->query($emailQuery);

		if (mysqli_num_rows($resultEmail) > 0)
		{
			session_start();
			$_SESSION["registerError"] = "Mailen finns redan registrerad.";
			header("location: register.php");
			die();
		}
		else {
			//När vi sedan lägger in användarens information i tabellen User, är det det hashade (alltså skyddade/krypterade) lösenordet
			//som läggs in. Saltet sparas tillsammans med uppgifterna då det fungerar som en nyckel när användaren sen ska logga in, 
			//och det hashade inputlösenordet ska jämföras med det hashade lösenordet i databasen.
			$sql4 = "INSERT INTO User (UserMail, Password, Salt)
					VALUES ('$reg_email', '$hashed_password', '$salt')";
					
				
				doQuery($connection, $sql4);
				header("location: login.php");

		}
		$connection->close();
	}
	
	//Denna funktion randomiserar ett salt som senare kommer att kombineras med användarens lösenord.
	//Jag anger att den ska bestå av 50 tecken.
	//Funktionen är hittad här: http://code.tutsplus.com/tutorials/understanding-hash-functions-and-keeping-passwords-safe--net-17577
	function createSalt() 
	{
		return substr(sha1(mt_rand()),0,20);
	}
?>