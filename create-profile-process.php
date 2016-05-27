<?php
	include("db.php");
	
	$firstName = mysqli_real_escape_string($connection, $_POST['first_name']); 
	$lastName = mysqli_real_escape_string($connection, $_POST['last_name']);
	$telephone = mysqli_real_escape_string($connection, $_POST['profile_telephone']);
	$description = mysqli_real_escape_string($connection, $_POST['profile_description']);
	$picture = mysqli_real_escape_string($connection, $_POST['picture']);
	
	updateProfile($connection, $firstName, $lastName, $telephone, $description, $picture);
	
	function updateProfile($connection, $firstName, $lastName, $telephone, $description, $picture)
	{
		session_start();

		$userEmail = $_SESSION['user_email'];
		$userID2 = $_SESSION['user_ID'];
		
		$sql8 = "SELECT UserID FROM Volunteer WHERE UserID = '$userID2'";
					
		$emptyProfile = doQuery($connection, $sql8);

		while($row = mysqli_fetch_array($emptyProfile))
			{
				$empty = $row['UserID'];
			}

		if($emptyProfile->num_rows == 0)
		{
			$sql11 = "INSERT INTO Volunteer (UserID, FName, LName, UserPhone, UserDescript, UserRank, UserPic)
			VALUES ('$userID2', '$firstName', '$lastName', '$telephone', '$description', '1', '$picture')";
			// doQuery($connection, $sql11);
			
			if ($connection->query($sql11) === TRUE) 
			{
				header("location: profile.php");
			} 
			else 
			{
			echo "Error: " . $sql11 . "<br>" . $connection->error;
		}
			
		}
		else
		{
			$sql2 = "UPDATE Volunteer SET FName='$firstName',LName='$lastName',UserPhone='$telephone',UserDescript='$description', UserRank = '1', UserPic='$picture' WHERE UserID = '$userID2'";
				
			if ($connection->query($sql2) === TRUE) 
			{
				header("location: profile.php");
		} else {
			echo "Error: " . $sql2 . "<br>" . $connection->error;
		}
			
		}
		


	}

		
		

		
		
		
		


		
		
	
?>	
