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
<meta charset="UTF-8">
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

div{
			background-color:#8e9199;
			font-family:Tahoma, Geneva, sans-serif;
			font-size:1.2em;
			margin: auto;
			width: 20em;
			height: auto;
			padding:4em 6em 4em 6em;
			margin-top:2em;
			
			
		}
input[type="number"] {
   width:50px;
}
.kos {
	width:50%;
	padding:3em;
	font-family:Tahoma, Geneva, sans-serif;
	margin:auto;
	background-color:#8e9199;
	margin:auto;
	margin-bottom:5em;
	margin-top:2em;
	text-align:center;
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


<?php


	require_once 'funkcije.php';
	
	if(!isset($_SESSION['tabela_kosarice'])) 
	{
		echo '<div class="kos">';
		echo '<p>Vaša košarica je prazna<p>';
		echo '</div>';
	}

else	
	{
	echo '<div>';
	$tab=$_SESSION['tabela_kosarice'];	
	$podatki=get_izdelke();
	
	if(isset($_GET['kupljeno']))
	{
		
		foreach($_GET as $k=>$st)
			dodaj_nakup($st, (int)$k);
		dodaj_koncni_znesek();
		unset($_SESSION['tabela_kosarice']);
		header('location:placilo.php');
	}
	
	

	echo '<form action=kosarica.php>';
	foreach($podatki as $p)
		foreach($tab as $t)
			if($p['ID_izdelek']==$t)
			{	
				$tmp=number_format($p['cena'],2,'.',' ');
				echo 'Izdelek: '.$p['naziv'].'<br> Opis: '.$p['opis'].'<br> cena: '.$tmp;
				echo '<span style="float:right;}">
					  <input type="number" name="'.$t.'" min="1" value="1" />
					  </span>';
				echo '<br>
				 <hr style="color:black"><br>';
				
			}
		echo '<input type="text" name="kupljeno" value="1" hidden="hidden">';
		echo '<input type="submit" value="Pojdi na placilo!" />';
	echo '</form>';
	echo '</div>';
	}


?>
	
	</body>

</html>
