
<?php
	//inkludera databasen. Nu finns connection i variabeln "$connection"
	include("db.php");
	
	//Hämtar input från formulären password och email, och lägger värdet av dessa i respektive variabler.
	//Vi gör queryn säker genom att använda mysqli_real_escape_string.
	$Password = $_POST["password"];
	$Email = $_POST["email"];

	loginUser($connection, $Email, $Password);

		//Här jämförs användarens input av mejl och lösen med de som finns i databasen User. Är de identiska, loggas 
		//användaren in och redirectas till kommentarssidan. Är användaren inte inloggad (dvs. ingen session startas)
		//kan hen inte se kommentarssidan.
		function loginUser($connection, $Email, $Password)
		{
			//Väljer alla de rader där mejladressen == användarens input av mejladressen.
			$selectedRow = "SELECT * FROM User WHERE UserMail == '$Email'";
			
			$selectedResult = doQuery($connection, $selectedRow);
			
			
			
			//num_rows returnerar antalet rader i result-setet. Dvs, om användaren finns ska den loggas in:
			if(mysqli_num_rows($selectedResult) != 0)
			{
				$row = $selectedResult->fetch_assoc();
				
				$databaseSalt = $row['Salt'];
				$databasePassword = $row['Password'];
				
				//Här hashas inputlösenordet på samma vis som vid registreringen, och läggs i variabeln $hashedPw.
				$hashedPw = sha1($databaseSalt.$Password);
				
				//Om databasens hashade lösen och inputlösen är identiska kan en session startas så loggas
				//användaren in och redirectas till kommentarssidan.
				if($hashedPw == $databasePassword)
					{

						session_start();
						// Startar en session:
						$_SESSION['reg_email']= $Email; 
						header("location: mission.php");
					}
					else
					{
						header("location: HoU_main.php");
						echo "Wrong e-mail or password.";
					}
			}	
			
			else
			{
				header("location: register.php");
				echo "You are not registered. Please do so :-)";
			}
		}

?>