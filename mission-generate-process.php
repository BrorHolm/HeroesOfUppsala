<?php
	include("db.php");

	//sätt missionID utifrån vad som POSTats från förra sidan
	$miss_ID = $_GET['miss_ID'];

	displayMissionInfo($connection, $miss_ID);

		//visa missioninfo
		function displayMissionInfo($connection, $miss_ID)
		{
			//Väljer den rad där MissID == $miss_ID i Mission-tabellen.
			//Joinar Mission med Provider 
			$selectedRow = "SELECT *
						FROM Mission 
						INNER JOIN Provider
						ON Mission.ProvID = Provider.ProvID
						WHERE MissID = '$miss_ID'";
			$selectedResult = doQuery($connection, $selectedRow);                

			//Skriver ut från databasraden
            while($row = mysqli_fetch_assoc($selectedResult))
            {       
                echo '
                <div>
                	<h1>'.$row["Title"].'</h1>
                </div>
                <div>
                	<h2>Mission briefing</h2>
                </div>
                <div>
                	'.$row["MissDescript"].'
                </div>
                <div>
                	<h2>Mission details</h2>
                </div>
               	<div>
                	<b>Mission starts:</b> '.$row["StartDate"].'
                </div>
                	<b>Mission ends:</b> '.$row["EndDate"].'
                </div>
                <div>
                	<b>Mission provider:</b> '.$row["ProvName"].'
               	</div>
                ';

                //hämta mail men spara som variabel
                //detta för att den kanske ska döljas beroende
                //på om man är inloggad eller ej
                $prov_mail = $row['ProvMail'];
            }

            //Kolla om användaren är inloggad, visa email i så fall
            if(isset($_SESSION['user_ID'])){
        	    echo '<div>
           				<b>Email:</b> '.$prov_mail.'
               		</div>';

            	//Försök hämta en rad med matchande UserID och missID
               	$user_ID = $_SESSION['user_ID'];
               	$selectedRow = "SELECT *
						FROM User_Mission 
						WHERE UserID = '$user_ID' AND MissID = '$miss_ID'";
				$selectedResult = doQuery($connection, $selectedRow); 

				//om ingen matchande rad hittats, visa anmälningsknapp
            	if($selectedResult->num_rows == 0){
            		echo '<form method="GET" action="mission-apply-process.php">
            				<input name="miss_id" type="hidden" value="'.$miss_ID.'"/>
            				<input name="apply-mission-button" type="submit" value="Apply for this mission">
            			</form>';
            	}

            	//om matchande rad hittades, är användaren redan anmäld
            	else{
            		echo '<div>You have applied for this mission. Please wait for the mission provider\'s answer. The answer is shown in your profile.</div>';
            	}
            }    

            //be användaren logga in för att anmäla sig
            else{
            	echo '<div><a href="register.php">Register</a> to apply for this mission</div>';
            }             
		}
?>