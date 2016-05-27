<?php

	include("db.php");
	
	//VIKTOR: ändrade detta till _session och user_email istället för _post och email
	$User_ID = $_SESSION["user_ID"];
	displayProfileInfo($connection, $User_ID);

		//Här jämförs användarens input av mejl och lösen med de som finns i databasen User. Är de identiska, loggas 
		//användaren in och redirectas till kommentarssidan. Är användaren inte inloggad (dvs. ingen session startas)
		//kan hen inte se kommentarssidan.
		function displayProfileInfo($connection, $User_ID)
		{
			//Väljer alla de rader där mejladressen == användarens input av mejladressen.
            //INNER JOIN med User för att nå user_mail
			$selectedRow = "SELECT * 
                        FROM Volunteer
                        INNER JOIN User
                        ON Volunteer.UserID=User.UserID 
                        WHERE Volunteer.UserID = '$User_ID'";
			$selectedResult = doQuery($connection, $selectedRow);

                        //VIKTOR: om profil inte är skapad än visas detta
                        if ($selectedResult->num_rows == 0) {
                            echo '<div>';
                            echo '<a href="create-profile.php">Create Profile</a>';   
                            echo '</div>';                 
                        }
                
                        //VIKTOR: annars detta
                        else {
                            while($row = mysqli_fetch_assoc($selectedResult))
                            {       
                                echo '<div>';
                                echo $row['UserPic'];
                                echo '</div><div>';                                
                                echo $row['FName'].' '.$row['LName'];
                                echo '</div><div>';
                                echo $row['UserRank'];
                                echo '</div><div>';
                                echo $row['UserDescript'];
                                echo '</div><div>';
                                echo $row['UserMail'];
                                echo '</div><div>';
                                echo $row['UserPhone'];
                                echo '</div><div>';
                                echo '<a href="create-profile.php">Edit Profile</a></div>';
                            }                
                        }
		}

?>