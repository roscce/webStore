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
				<form action="nov_uporabnik.php">
				
					Ime: <input type="text" name="ime"> <br>
					Priimek: <input type="text" name="priimek"><br>
					GSM: <input type="text" name="GSM"><br>
					Stacioarni telefon: <input type="text" name="stac_tele"><br>
					Naslov: <input type="text" name="naslov"><br>
					Poštna številka:<input type="text" name="pos_st"><br>
					Email: <input type="text" name="email"><br>
					Spol: 
					m<input type="radio" name="spol" value="m">
					z<input type="radio" name="spol" value="z"><br>
					Uporabniško ime:
					<input type="text" name="uporabnisko_ime"> <br>
					Geslo:
					<input type="password" name="geslo"> <br>
					<input type="submit" value="Ustvari racun"> <br>
				
				</form>
			<pre>
		</div>
</body>
</html>


<?php

require_once 'funkcije.php';


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
	$upo=$_GET['uporabnisko_ime'];
	$g=$_GET['geslo'];
	echo '<pre>';
	dodaj_uporabnika($ime, $priimek, $stac_tel, $gsm, $naslov, $posta, $email, $spol, $upo, $g);
	header('location:login.php');
    
}
?>
