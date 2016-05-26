<?php
	
	//inkludera databasen. Nu finns connection i variabeln "$connection"
	include("db.php");

	//Vi gör queryn säker genom att använda mysqli_real_escape_string.
	$provider = $_POST['mission_provider'];
	$title = mysqli_escape_string($connection, $_POST['mission_title']);
	$description = mysqli_escape_string($connection, $_POST['mission_description']);
	$address = mysqli_escape_string($connection, $_POST['mission_address']);
	$start = $_POST['mission_start_date'].' '.$_POST['mission_start_time'];
	$end = $_POST['mission_end_date'].' '.$_POST['mission_end_time'];
	$is_paid = isset($_POST['mission_is_paid']);

	//skicka till databasen
	$query = "INSERT INTO Mission VALUES (NULL, '$provider', '$title', '$description', '$address', '$start', '$end', '$is_paid', 0)";
	doQuery($connection, $query);

	//använd echo-statementet nedan för att se inputtad data
	/*echo $provider."<br>".
	$title."<br>".
	$description."<br>".
	$address."<br>".
	$start."<br>".
	$end."<br>".
	$is_paid;*/	