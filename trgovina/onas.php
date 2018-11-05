<?php
session_start();
	if(!isset($_SESSION['ID_uporabnika'])) header("Location:login.php");

?>

<html>
<head>
<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {margin: 0;
		background-color:#b7b9bc;}

ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 0.875em 1em;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #5e6063;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 37.5em){
    ul.topnav li.right, 
    ul.topnav li {float: none;}
}

div {
			background-color:#8e9199;
			margin: auto;
			width: 50%;
			padding: 2em;
			font-family:Tahoma, Geneva, sans-serif;
			margin-top:5em;
			font-size:1.3em;
}
</style>

</head>
<body>

<ul class="topnav">
  <li><a class="active" href="kupuj.php"><span style="font-family:Tahoma, Geneva, sans-serif;">Nakupuj</span></a></li>
  <li><a href="podatki.php"><span style="font-family:Tahoma, Geneva, sans-serif;">Podatki</span></a></li>
  <li><a href="onas.php"><span style="font-family:Tahoma, Geneva, sans-serif;">O nas</span></a></li>
  <?php

	if(isset($_SESSION['tabela_kosarice']))
	{		
			$st=count($_SESSION['tabela_kosarice']);
			echo 	
					'<li><a href="kosarica.php">
							<i class="fa fa-shopping-cart" style="color:yellow;font-size:1.0625em"> 
							<span style="font-family:Tahoma, Geneva, sans-serif;font-size:0.75em;"><sub> '.$st.'</sub></span>
							</i> <i class="fa fa-exclamation-circle"></i></i></span></a>
					</li>';
	}
		else
			echo '<li><a href="kosarica.php"><i class="fa fa-shopping-cart fa-lg" style="color:white;"></i></span></a></li>';
		
	if($_SESSION['uporabnisko_ime']=='admin' && $_SESSION['geslo']=='admin')
	echo		'<li><a href="dodajanje_izdelkov.php"><span style="font-family:Tahoma, Geneva, sans-serif;">Dodaj izdelek</span></a></li>';
	 
 ?>
  <li class="right"><a href="odjava.php"><span style="font-family:Tahoma, Geneva, sans-serif;">Odjava</span></a></li>
</ul>

<div>
	<p>
		Podjetje je nastalo leta 2017 z namenom, da bi moški lahko oblekli kar si dejansko želijo. Naše podjetje je namenjena prodaji
		moških kosov oblaèil. Sedež podjetja se nahaja v zmajevem mestu Ljubljana. Povezujemo stranke in jim ponujamo nizko cenovne, vendar
		visoke kvalitete.
	<p>
	<br>
	<p>
		Kontakti:<br> <br>
		
		Jože Lunder Bohinjc, direktor +38651246220 	<br>
		Jan Plestenjak, vodja financ  +38640215554	<br>
		
	<p>
</div>

</body>

</html>