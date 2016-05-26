<?php
session_start();
if(isset($_SESSION['user_email']))
{
	echo "Någon är inloggad";
	echo $_SESSION['user_email'] . "är inloggad";
	if($_SESSION['admin'] == 0)
	{
		echo "Du är inte admin";
	}
	else if ($_SESSION['admin'] == 1)
	{
		echo "Du har adminrättigheter.";
	}
}
else {
	echo "Ingen  är inloggad";
}

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta charset="utf-8">
		
		
        <title>Heroes of Uppsala</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HoU.css">
    </head>
    <body>
		<div id="nav">    
            <div class="section group">
                <div class="col span_3_of_3">
                    <ul>
                        <li><a href="index.php">START</a></li>
						<li><a href="login.php">LOG IN</a></li>
                        <li><a href="logout.php">LOG OUT</a></li>
						<li><a href="register.php">REGISTER</a></li>
                        <li><a href="profile.php">PROFILE</a></li>
                        <li><a href="mission.php">MISSIONS</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>

                    </ul>
                </div>
            </div>
        </div>  

		
        <div class="section group">
            <!--<div class="col span_1_of_3" id="leftnav">
                <img src="heroesofuppsala.png" alt="Heroes of Uppsala">
            </div>-->
		  <div class="col span_2_of_3" id="content">
            <div class="mission_forms" id="content">
                <h1>Create Mission</h1>
                <form name="form_create_mission" method="POST" action="mission-create-process.php">
                    <div>
                        <h2>Organization</h2>
                        <?php include('mission-create-get-organization-list.php'); ?>
                    </div>
                    <div>
                        <h2>Title</h2>
                        <input name="mission_title" type="text" placeholder="Enter a title...">
                    </div>
                    <div>
                        <h2>Description</h2>
                        <textarea name="mission_description">Please enter your mission...</textarea>
                    </div>
                    <div>
                        <h2>Address</h2>
                        <input name="mission_address" placeholder="Enter the mission address...">
                    </div>
                    <div>
                        <h2>Start</h2>
                        <input name="mission_start_date" type="date">
                        <input name="mission_start_time" type="time">
                    </div>
                    <div>
                        <h2>End</h2>                        
                        <input name="mission_end_date" type="date">
                        <input name="mission_end_time" type="time">
                    </div>
                    <div>
                        <input name="mission_is_paid" type="checkbox">Display mission on front page (10 SEK)
                    </div>
                    <div>
                        <input id="create_button" type="submit" value="Create Mission">
                    </div>
                </form>
            </div>
          </div>
        </div>
    </body>
</html>