<?php

	include("db.php");

	//sätt variabler
	session_start();
	$miss_ID = $_GET['miss_id'];
	$user_ID = $_SESSION['user_ID'];

	//ta bort raden från User_Mission 
	//detta är de facto en "avanmälning"
	$query = "DELETE FROM User_Mission WHERE UserID = '$user_ID' AND MissID = '$miss_ID'";
	doQuery($connection, $query);

	header("location: ".$_GET['previous_page']);

?>