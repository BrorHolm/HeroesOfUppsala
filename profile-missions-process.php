<?php
	
	//raden nedan är utkommenterad då db.php redan är inkluderad
	//i profile-process.php som föregår detta skript
	/*include("db.php");*/

	//visa uppdrag som användaren anmält sig till
	//INNER JOIN med tabellerna mission och provider
   	$user_ID = $_SESSION['user_ID'];
   	$selectedRow = "SELECT *
				FROM User_Mission 
				INNER JOIN Mission
				ON User_Mission.MissID = Mission.MissID
				INNER JOIN Provider
				ON Mission.ProvID = Provider.ProvID
				WHERE UserID = '$user_ID'";
	$selectedResult = doQuery($connection, $selectedRow); 	

	//om det inte finns uppdrag att visa meddelas det nedan
	if($selectedResult->num_rows == 0){
		echo 'You haven\'t applied to any missions yet.';
	}

	//om det finns uppdrag att visa skrivs de ut nedan
	if($selectedResult->num_rows > 0){
		echo '<table name="applied_missions">
				<tr>
					<th>Provider</th>
					<th>Title</th>
					<th>Starts</th>
					<th>Ends</th>
					<th>Accepted?</th>
			</tr>';

		//skriv ut från databasen
		//lägger till en knapp för att ta bort anmälan
		while($row = mysqli_fetch_assoc($selectedResult)){
			//kolla om provider gett svar, och vilket svar
			if(is_null($row["IsUserAccepted"]))
			{
				$accepted = "Pending";
			}
			else if($row["IsUserAccepted"] == 0)
			{
				$accepted = "Not accepted";
			}
			else
			{
				$accepted = "Accepted";
			}

		    echo '<tr>
	            	<td>'.$row["ProvName"].'</td>
            		<td>'.$row["Title"].'</td>
					<td>'.$row["StartDate"].'</td>
					<td>'.$row["EndDate"].'</td>
					<td>'.$accepted.'</td>
					<td>
						<form id="mission_generate_form" method="GET" action="mission-generate.php">
							<input name="miss_ID" type="hidden" value="'.$row["MissID"].'"/>
							<input name="mission_generate_button" type="submit" value="More info"/>
						</form>
					</td>
					<td>
						<form id="mission_generate_form" method="GET" action="mission-unapply-process.php">
							<input name="miss_id" type="hidden" value="'.$row["MissID"].'"/>
							<input name="previous_page" type="hidden" value="profile.php"/>
							<input name="mission_generate_button" type="submit" value="Unapply"/>
						</form>
					</td>
				</tr>';

		}
	}


	//show missions that the user's organizations have created

?>