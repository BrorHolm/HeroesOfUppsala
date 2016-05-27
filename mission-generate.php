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
    echo "Ingen är inloggad";
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
						if(isset($_SESSION['user_email']))
						{ ?>
                        <li><a href="index.php">START</a></li>
						<!-- <li><a href="login.php">LOG IN</a></li>-->
                        <li><a href="logout.php">LOG OUT</a></li>
						<!-- <li><a href="register.php">REGISTER</a></li>-->
                        <li><a href="profile.php">PROFILE</a></li>
                        <li><a href="missions.php">MISSIONS</a></li>
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
                <?php
					include("mission-generate-process.php");						
                ?>
            </div>
        </div>
    </body>
</html>