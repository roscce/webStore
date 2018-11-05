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
body {
margin: 0;
background-color:#b7b9bc;
}

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


/* --------------------------------------------------Koda za to stran--------------------------------------------*/

.podatki {
    margin: auto;
    width: 50%;
    padding: 2em;
	font-size:1.5em;
	margin-top:3em;
	background-color:#8e9199;
	font-family:Tahoma, Geneva, sans-serif;
	 margin-bottom:2em; 
}
.zgodovina {
	width:50%;
	padding:3em;
	font-family:Tahoma, Geneva, sans-serif;
	margin:auto;
	background-color:#8e9199;
	margin:auto;
	margin-bottom:5em;
}
th, td {
    padding: 0.3125em;
}
th {
	
	border-bottom:1px solid black;
}
td {
	text-align:right;
}
table{
  width:30em;
	margin-left: 1.25em;
}
.zgo {
	font-family:Tahoma, Geneva, sans-serif;
	color:#333;
	font-size: 2em;
	margin-left:3em;
}

</style>
<meta charset="UTF-8">
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


		<div class="podatki">
		
		<?php

			require_once 'funkcije.php';

			$id=$_SESSION['ID_uporabnika'];
			$podatki=get_podatki($id);
		
			echo 'Ime: '.$podatki['ime'].'<br>';
			echo 'Priimek: '.$podatki['priimek'].'<br>';
			echo 'GSM: '.$podatki['gsm'].'<br>';
			echo 'Stacionarni telefon: '.$podatki['stacionarni_telefon'].'<br>';
			echo 'Naslov: '.$podatki['naslov'].'<br>';
			echo 'Poštna številka: '.$podatki['postna_stevilka'].'<br>';
			echo 'Email: '.$podatki['email'].'<br>';
			echo 'Spol: '.$podatki['spol'].'<br>';
			echo '<br>';
			echo '<span style="float:right"><a href="update_podatke.php">Spremeni svoje podatke </a><span>';

		
		?>
		
		
		</div>
		<br> <br>
		<div class="zgo"> <p>Vaša zgodovina nakupovanja<p> </div>
	</body>

</html>



<?php
	podatki_nakupov();

?>