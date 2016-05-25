
<?php
	//inkludera databasen. Nu finns connection i variabeln "$connection"
	include("db.php");
	
	//Hämtar input från formulären password och email, och lägger värdet av dessa i respektive variabler.
	//Vi gör queryn säker genom att använda mysqli_real_escape_string.
	$input_Password = $_POST["password"];
	$input_Email = $_POST["email"];

	loginUser($connection, $input_Email, $input_Password);

		//Här jämförs användarens input av mejl och lösen med de som finns i databasen User. Är de identiska, loggas 
		//användaren in och redirectas till kommentarssidan. Är användaren inte inloggad (dvs. ingen session startas)
		//kan hen inte se kommentarssidan.
		function loginUser($connection, $input_Email, $input_Password)
		{

			//Väljer alla de rader där mejladressen == användarens input av mejladressen.
			$selectedRow = "SELECT * FROM User WHERE Mail = '$input_Email'";
			// $selectedResult = $connection->query($selectedRow);
			
			$selectedResult = doQuery($connection, $selectedRow);
			
			//num_rows returnerar antalet rader i result-setet.
			if($selectedResult->num_rows > 0)
			{
				$row = $selectedResult->fetch_assoc();
				
				$databaseSalt = $row['Salt'];
				$databasePassword = $row['Password'];
				
				//Här hashas inputlösenordet på samma vis som vid registreringen, och läggs i variabeln $hashedPw.
				$hashedPw = sha1($databaseSalt.$input_Password);
				
				//Om databasens hashade lösen och inputlösen är identiska kan en session startas så loggas
				//användaren in och redirectas till kommentarssidan.
				if($hashedPw == $databasePassword)
					{
						session_start();
						//Startar en session:
						$_SESSION['e_mail']= $input_Email;
						header("location: index.php");
					}
					else
					{
						header("location: registration.php");
						echo "Inloggning misslyckades.";
					}
			}	
			
			else
			{
				header("location: registration.php");
				echo "Inloggning misslyckades.";
			}
		}

?>