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
                    <ul> <?php
						session_start();
						if(isset($_SESSION['user_email']))
						{ ?>
                        <li><a href="index.php">START</a></li>
						<!-- <li><a href="login.php">LOG IN</a></li>-->
                        <li><a href="logout.php">LOG OUT</a></li>
						<!-- <li><a href="register.php">REGISTER</a></li>-->
                        <li><a href="profile.php">PROFILE</a></li>
                        <li><a href="mission.php">MISSIONS</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
						<?php }
						else 
						{ ?>
						<li><a href="index.php">START</a></li>
						<li><a href="login.php">LOG IN</a></li>
                        <!-- <li><a href="logout.php">LOG OUT</a></li>-->
						<li><a href="register.php">REGISTER</a></li>
                        <!--<li><a href="profile.php">PROFILE</a></li>-->
                        <li><a href="mission.php">MISSIONS</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
						<?php } ?>

                    </ul>
                </div>
            </div>
        </div>  

		<form method="POST" action="logout-process.php" >
			<div class="section group">
				<p> Are you sure you want to log out? </p>
				<input id="logout_button" type="submit" value="Log out">
			</div>
    </body>
</html>