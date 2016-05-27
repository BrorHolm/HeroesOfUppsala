<?php
	include("db.php");
	
	displayMissions($connection);

	function displayMissions($connection)
	{
		//Väljer alla rader från missions-tabellen.
		//Joinar Mission med Provider 
		$selectedRow = "SELECT *
						FROM Mission 
						INNER JOIN Provider
						ON Mission.ProvID = Provider.ProvID
						WHERE IsCompleted = 0";
		$selectedResult = doQuery($connection, $selectedRow);

		//echo var_dump($selectedResult);

		//skriver ut alla table headers
		echo '
			<tr>
				<th>Provider</th>
				<th>Title</th>
				<th>Starts</th>
				<th>Ends</th>
			</tr>
		';

		//skriver ut rows från databasen
		//title går att klicka på för att komma till en genererad mission-sida
        while($row = mysqli_fetch_assoc($selectedResult))
        {       
            echo '
            	<tr>
	            	<td>'.$row["ProvName"].'</td>
            		<td>'.$row["Title"].'</td>
					<td>'.$row["StartDate"].'</td>
					<td>'.$row["EndDate"].'</td>
					<td>
						<form id="mission_generate_form" method="GET" action="mission-generate.php">
							<input name="miss_ID" type="hidden" value="'.$row["MissID"].'"/>
							<input name="mission_generate_button" type="submit" value="More info"/>
						</form>
					</td>
				</tr>
            ';
        }                
                        
	}

?>