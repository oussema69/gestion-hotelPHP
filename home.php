<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="accueil.css">
</head>
<body>
    <ul>
		<?php 
	session_start();

	if(isset($_SESSION['role']) && $_SESSION['role'] == 2){
		// user is logged in with a role of 2
		$user_email = $_SESSION['email']; 
	
	} else {
		// user is not logged in or does not have the required role
		header("location:login/signin.php");
	

	}
	
	require 'connection.php';
	include 'User.php';
	 // Set the INSERT SQL data
	 $user=new User(null,"","","","","","","");
	 $res=$user->__selectionbyemailClient($conn,$user_email);
	 
	 if ($res !== false && $res->rowCount() > 0) {
		 $row=$res->fetch();
		 //var_dump($row); 
	 } 


   
		?>
		<a href="login\logout.php">Logout</a>

        <li><a href="../gestionHotel-php/home.php">Home</a></li>
        <li><a href="ClientSide/chambre.php">Create New Reservation</a></li>
        <li><a href="../HTML project/contact.html">Contact</a></li>
        <li><a href="../HTML project/about.html" id="id1">About</a></li>
        <li><img src="test2.jpg" alt="" id="id1"></li>
      </ul>
	 <div class="center">
	  <div class="row">
		<div class="column">
		  <div class="card">
			<h3>Marhaba Royale</h3>
			<div class="pic1">
			  </div>
			<p>Prix : 190 DT</p>
			<p>Lieu : Sousse</p>
			<p>Le Marabout est un Hôtel de 3 étoiles, Situé non loin de monuments tels que Ribat (2,2 km) 
				et Medina of Sousse (2,3 km), Le Marabout est parfait pour découvrir les différentes 
				attractions de Sousse.</p>
		  </div>
		</div>
	  
		<div class="column">
		  <div class="card">
			<h3>Mehari</h3>
			<div class="pic2">
			  </div>
			  <p>Prix : 170 DT</p>
			  <p>Lieu : Tabarka</p>
			  <p>Situé sur la côte méditerranéenne, cet élégant complexe en bord de plage se trouve à 13 minutes à pied du parcours de golf de Tabarka, à 3 km du fort génois de Tabarka et à 12 km de
				l'aéroport de Tabarka.</p>
		  </div>
		</div>
		
		<div class="column">
		  <div class="card">
			<h3>Medina Belisaire & Thalasso</h3>
			<div class="pic3">
			  </div>
			  <p>Prix : 210 DT</p>
			  <p>Lieu : Hammamet</p>
			  <p>Ce complexe balnéaire haut de gamme tout compris offre une vue sur le golfe d'Hammamet. Il est situé à proximité de la route RN1 et à 2 km du parc d'attractions Carthageland.

		  </div>
		</div>
	  </div>
	  <div class="row">
		<div class="column">
		  <div class="card">
			<h3>La Cigale</h3>
			<div class="pic4">
			  </div>
			<p>Prix : 250 DT</p>
			<p>Lieu : Tabarka</p>
			<p>Situé sur une plage de sable bordant la mer Méditerranée. Il se trouve à 13 km de l'aéroport international de Tabarka-Aïn Draham
				et à 5 km des affleurements rocheux pittoresques des Aiguilles de Tabarka.</p>
		  </div>
		</div>
	  
		<div class="column">
		  <div class="card">
			<h3>Sousse Palace Hotel & Spa</h3>
			<div class="pic5">
			  </div>
			  <p>Prix : 150 DT</p>
			  <p>Lieu : Sousse</p>
			  <p>Situé dans le centre de Sousse, à proximité de la médina. Il propose des chambres, des suites, des piscines extérieure et intérieure, ainsi qu'un centre de bien-être et une salle de sport.</p>
		  </div>
		</div>
		
		<div class="column">
		  <div class="card">
			<h3>Al mouradi</h3>
			<div class="pic6">
			  </div>
			  <p>Prix : 210 DT</p>
			  <p>Lieu : Hammamet</p>
			  <p>Ce complexe balnéaire haut de gamme tout compris offre une vue sur le golfe d'Hammamet. Il est situé à proximité de la route RN1 et à 2 km du parc d'attractions Carthageland.

		  </div>
		</div>
		
		
	  </div>
	</div>




	<footer class="footer-distributed">
		<div class="footer-left">
			<h3>Company<span>logo</span></h3>
			<p class="footer-links">
				<a href="#" class="link-1">Home</a>					
				<a href="#">Blog</a>
				<a href="#">Pricing</a>
				<a href="#">About</a>
				<a href="#">Contact</a>
			</p>

			<p class="footer-company-name">Reservation hotelière © 2022.All rights deserved</p>
		</div>

		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>Tunisie</span> Ariana</p>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p>+216 29 041 481</p>
			</div>

			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="samirchemkhi09@gmail.com">samirchemkhi09@gmail.com </br>oussemamhatli62@gmail.com</a></p>
			</div>

		</div>

		<div class="footer-right">

			<p class="footer-company-about">
				<span>About the company</span>
				Our agency seeks the satisfaction of our customers in advance by providing a service that reflects the expected good quality.
			</p>

			

		</div>

	</footer>
    
</body>
</html>