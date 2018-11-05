<?php
		session_start();
		require_once "funkcije.php";
		if(!isset($_SESSION['ID_uporabnika'])) header("Location:login.php");

		$pod=trenutna_stranka();

		

echo '
<html>
<head>
	<style>
		div{
			background-color:#8e9199;
			font-family:Tahoma, Geneva, sans-serif;
			font-size:1.2em;
			margin: auto;
			width: 53em;
			padding-left:-1em;
			
		}
	</style>
	<meta charset="UTF-8">
</head>
<body style="background-color:#b7b9bc">
		
		
		<div>
			<pre>
				<form action="update_podatke.php">
				
					Ime: <input type="text" name="ime" value="'.$pod['Ime'].'"> <br>
					Priimek: <input type="text" name="priimek" value="'.$pod['Priimek'].'"><br>
					GSM: <input type="text" name="GSM" value="'.$pod['GSM'].'"><br>
					Stacioarni telefon: <input type="text" name="stac_tele" value="'.$pod['Stacionarni_telefon'].'"><br>
					Naslov: <input type="text" name="naslov" value="'.$pod['Naslov'].'"><br>
					Postna stevilka:<input type="text" name="pos_st" value="'.$pod['Postna_stevilka'].'"><br>
					Email: <input type="text" name="email" value="'.$pod['email'].'"><br>
					Spol: 
					m<input type="radio" name="spol" value="m">
					z<input type="radio" name="spol" value="z"><br>
					
					<input type="submit" value="Posodobi racun"> <br>
				
				</form>
			<pre>
		</div>
</body>
</html>';

 



if(isset($_GET['ime']) && isset($_GET['priimek']))
{
	$ime=$_GET['ime'];
	$priimek=$_GET['priimek'];
	$stac_tel=$_GET['stac_tele'];
	$gsm=$_GET['GSM'];
	$naslov=$_GET['naslov'];
	$posta=$_GET['pos_st'];
	$email=$_GET['email'];
	$spol=$_GET['spol']; 
	echo '<pre>';
	update_uporabnika($ime, $priimek, $stac_tel, $gsm, $naslov, $posta, $email, $spol);
	
    header("location:podatki.php");
}
