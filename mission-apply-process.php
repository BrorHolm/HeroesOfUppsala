<?php

	//etablera kontakt med databas. sparas i $connection
	include("db.php");

	//hämta variabler från global
	session_start();
	$miss_ID = $_GET['miss_id'];
	$user_ID = $_SESSION['user_ID'];

	applyUserForMission($connection, $user_ID, $miss_ID);

	//generera mission-sidan användaren kom ifrån igen
	header("location: mission-generate.php?miss_ID=".$miss_ID);

	function applyUserForMission($connection, $user_ID, $miss_ID)
	{
		//Kollar databasen om User redan är kopplad till Mission
		$selectedRow = "SELECT *
					FROM User_Mission 
					WHERE UserID = '$user_ID' AND MissID= '$miss_ID'";
		$selectedResult = doQuery($connection, $selectedRow);

		//Om User inte är kopplad till mission så koppla ihop
		//NULL-värdena handlar om bools som ännu inte fått värden
		if($selectedResult->num_rows == 0)
		{
			$query = "INSERT INTO User_Mission 
					VALUES ('$user_ID', '$miss_ID', NULL, NULL, NULL)";
			doQuery($connection, $query);
		}
	}
?>