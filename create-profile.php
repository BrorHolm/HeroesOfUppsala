<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100' rel='stylesheet' type='text/c'>
        <title>Heroes of Uppsala</title>
        <meta charset="UTF-8">
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
                        <li><a href="missions.php">MISSIONS</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
						<?php } ?>

                    </ul>
                </div>
            </div>
        </div>  

		
        <div class="section group">
            <!--<div class="col span_1_of_3" id="leftnav">
                <img src="heroesofuppsala.png" alt="Heroes of Uppsala">
            </div>-->
            <div class="col span_2_of_3" id="content">
            
			<h1> Edit Profile</h1> 
					<form method="POST" action="create-profile-process.php" >
					<p>Make sure you have an updated profile. This is what your future Mission Provider will see! </p>
					<div>
                        <h2>Picture</h2>
                        <input name="picture" id="picture" type="text" placeholder="Enter URL">
                    </div>
                    <div>
                        <h2>First name</h2>
                        <input name="first_name" id="first_name" type="text" placeholder="First Name">
                    </div>
					<div>
                        <h2>Last name</h2>
                        <input name="last_name" id="last_name" type="text" placeholder="Last Name">
                    </div>
					<div>
                        <h2>Telephone</h2>
                        <input name="profile_telephone" id="telephone" type="text" placeholder="Telephone">
                    </div>
                    <div>
                        <h2>Description</h2>
                        <textarea name="profile_description" id="profile_description" placeholder="Describe yourself..."></textarea>
                    </div>
                    <div>
                        <input id="update_button" type="submit" value="Update Profile">
                    </div>
                </form> 
					</form>
		
			<p> </p>
			<p> </p>
            </div>
        </div>
    </body>
</html>