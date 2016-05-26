
<?php

	//inkludera databasen. Nu finns connection i variabeln "$connection"
	include("db.php");
	
	//Vi g�r queryn s�ker genom att anv�nda mysqli_real_escape_string.
	$reg_password = mysqli_real_escape_string($connection, $_POST['password']); 
	$reg_email = mysqli_real_escape_string($connection, $_POST['email']);

	registerUser($connection, $reg_password, $reg_email);
	
	function registerUser($connection, $password, $email) //kom ih�g att inkl $connection
	{
		//http://www.w3schools.com/php/php_mysql_insert.asp
		//nedanst�ende �r hittat h�r

		//Vi l�gger v�rt skapade salt i $salt genom att anropa funktionen createUniqueSalt.
		$salt = createSalt();
		
		//Skapar hashat l�senord, det vill s�ga l�gger ihop salt och l�senord. Eftersom sha1 anv�ndes i funktionen
		//createUniqueSalt m�ste samma anv�ndas h�r. Detta f�r att saltet ska bli r�tt. 
		$hashed_password = sha1($salt.$password);
		
		$emailQuery = "SELECT Mail FROM User WHERE UserMail = '$email'";
		$resultEmail = $connection->query($emailQuery);

		if (mysqli_num_rows($resultEmail) > 0)
		{
			session_start();
			$_SESSION["registerError"] = "Mailen finns redan registrerad.";
			header("location: register.php");
			die();
		}
		else {
			//N�r vi sedan l�gger in anv�ndarens information i tabellen User, �r det det hashade (allts� skyddade/krypterade) l�senordet
			//som l�ggs in. Saltet sparas tillsammans med uppgifterna d� det fungerar som en nyckel n�r anv�ndaren sen ska logga in, 
			//och det hashade inputl�senordet ska j�mf�ras med det hashade l�senordet i databasen.
			$sql4 = "INSERT INTO User (UserMail, Password, Salt)
					VALUES ('$email', '$hashed_password', '$salt')";
					
				
				doQuery($connection, $sql4);
				header("location: login.php");

		}
		$connection->close();
	}
	
	//Denna funktion randomiserar ett salt som senare kommer att kombineras med anv�ndarens l�senord.
	//Jag anger att den ska best� av 50 tecken.
	//Funktionen �r hittad h�r: http://code.tutsplus.com/tutorials/understanding-hash-functions-and-keeping-passwords-safe--net-17577
	function createSalt() 
	{
		return substr(sha1(mt_rand()),0,20);
	}
?>