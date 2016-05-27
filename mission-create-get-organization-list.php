<?php

	//ansluter till databasen, sparas i $connection
	include('db.php');

	//hämta UserID utifrån aktuell session
	/*$Email = $_SESSION['user_email'];
	$query = "SELECT UserID FROM User WHERE UserMail = '$Email'";
	$result = doQuery($connection, $query);
	$UserID = mysqli_fetch_assoc($result)['UserID'];*/

	$UserID = $_SESSION['user_ID'];

	//hämtar alla organisationer som UserID är kopplad till, spara i result
	//joinar även User_Provider med Provider
	$query = "SELECT * FROM User_Provider INNER JOIN Provider ON User_Provider.ProvID=Provider.ProvID WHERE UserID = '$UserID'";
	$result = doQuery($connection, $query);
	
	//skriver ut organisationerna till sidan i form av en select-lista
	//viktigt att selectets form-attribut sätts till rätt namn!
	echo '<select name="mission_provider">';

	while ($row = mysqli_fetch_assoc($result)) {
		echo '<option value="'.$row["ProvID"].'">
					'.$row["ProvName"].'
				</option>';
	};

	echo '</select>';


?>