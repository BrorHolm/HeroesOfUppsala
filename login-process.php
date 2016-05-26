
<?php
	//inkludera databasen. Nu finns connection i variabeln "$connection"
	include("db.php");
	
	//Hämtar input från formulären password och email, och lägger värdet av dessa i respektive variabler.
	//Vi gör queryn säker genom att använda mysqli_real_escape_string.
<<<<<<< HEAD
<<<<<<< HEAD
	$Password = $_POST["password"];
	$Email = $_POST["email"];

	loginUser($connection, $Email, $Password);
=======
	$input_Password = $_POST["password"];
	$input_Email = $_POST["email"];

	loginUser($connection, $input_Email, $input_Password);
>>>>>>> refs/remotes/origin/dev
=======
	$Password = $_POST["password"];
	$Email = $_POST["email"];

	loginUser($connection, $Email, $Password);
>>>>>>> refs/remotes/origin/senaste_beata

		//Här jämförs användarens input av mejl och lösen med de som finns i databasen User. Är de identiska, loggas 
		//användaren in och redirectas till kommentarssidan. Är användaren inte inloggad (dvs. ingen session startas)
		//kan hen inte se kommentarssidan.
<<<<<<< HEAD
<<<<<<< HEAD
		function loginUser($connection, $Email, $Password)
		{

			//Väljer alla de rader där mejladressen == användarens input av mejladressen.
			$selectedRow = "SELECT * FROM User WHERE UserMail = '$Email'";

			
			$selectedResult = doQuery($connection, $selectedRow);
			
			//num_rows returnerar antalet rader i result-setet. Dvs, om användaren finns ska den loggas in:
=======
		function loginUser($connection, $input_Email, $input_Password)
=======
		function loginUser($connection, $Email, $Password)
>>>>>>> refs/remotes/origin/senaste_beata
		{
			//Väljer alla de rader där mejladressen == användarens input av mejladressen.
			$selectedRow = "SELECT * FROM User WHERE UserMail == '$Email'";
			
			$selectedResult = doQuery($connection, $selectedRow);
			
<<<<<<< HEAD
			//num_rows returnerar antalet rader i result-setet.
>>>>>>> refs/remotes/origin/dev
			if($selectedResult->num_rows > 0)
=======
			
			
			//num_rows returnerar antalet rader i result-setet. Dvs, om användaren finns ska den loggas in:
			if(mysqli_num_rows($selectedResult) != 0)
>>>>>>> refs/remotes/origin/senaste_beata
			{
				$row = $selectedResult->fetch_assoc();
				
				$databaseSalt = $row['Salt'];
				$databasePassword = $row['Password'];
				
				//Här hashas inputlösenordet på samma vis som vid registreringen, och läggs i variabeln $hashedPw.
<<<<<<< HEAD
<<<<<<< HEAD
				$hashedPw = sha1($databaseSalt.$Password);
=======
				$hashedPw = sha1($databaseSalt.$input_Password);
>>>>>>> refs/remotes/origin/dev
=======
				$hashedPw = sha1($databaseSalt.$Password);
>>>>>>> refs/remotes/origin/senaste_beata
				
				//Om databasens hashade lösen och inputlösen är identiska kan en session startas så loggas
				//användaren in och redirectas till kommentarssidan.
				if($hashedPw == $databasePassword)
					{

						session_start();
<<<<<<< HEAD
						//Startar en session:
<<<<<<< HEAD
						$_SESSION['e_mail']= $Email; 
						header("location: mission.php");
					}
					else
					{
						header("location: HoU_main.php");
						echo "Wrong e-mail or password.";
=======
						$_SESSION['e_mail']= $input_Email;
						header("location: index.php");
					}
					else
					{
						header("location: registration.php");
						echo "Inloggning misslyckades.";
>>>>>>> refs/remotes/origin/dev
=======
						// Startar en session:
						$_SESSION['reg_email']= $Email; 
						header("location: mission.php");
					}
					else
					{
						header("location: HoU_main.php");
						echo "Wrong e-mail or password.";
>>>>>>> refs/remotes/origin/senaste_beata
					}
			}	
			
			else
			{
<<<<<<< HEAD
<<<<<<< HEAD
				header("location: register.php");
				echo "You are not registered. Please do so :-).";
=======
				header("location: registration.php");
				echo "Inloggning misslyckades.";
>>>>>>> refs/remotes/origin/dev
=======
				header("location: register.php");
				echo "You are not registered. Please do so :-)";
>>>>>>> refs/remotes/origin/senaste_beata
			}
		}

?>