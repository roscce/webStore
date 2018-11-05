<?php
	require_once 'funkcije.php';
		session_start();
	if(isset($_GET['naziv']) && isset($_GET['opis']))
	{
		dodaj_izdelek($_GET['naziv'], $_GET['opis'], $_GET['cena'], $_GET['kategorija'],$_GET['slika']);
		echo '<script language="javascript">';
		echo 'alert("Uspesno dodan izdelek")';
		echo '</script>';
		unset($_GET);
	}
	?>


<html>

	<head>
	<meta charset="UTF-8">
		<style>
			
		div{
			background-color:#8e9199;
			font-family:Tahoma, Geneva, sans-serif;
			font-size:1.2em;
			margin: auto;
			width: 40em;
			padding-left:0em;
			margin-top:2em;
			
		}
		</style>
	</head>

	<body style="background-color:#b7b9bc;font-family:Tahoma, Geneva, sans-serif;">
	
	<div>
			<pre>
			<form action="dodajanje_izdelkov.php">
				Naziv: <input type="text" name="naziv"/><br>
				Opis: <input type="text" name="opis"/><br>
				Cena: <input type="number" step="0.01" name="cena" min="0"/><br>
				Pot slike: <input type="text" name="slika"/><br>
				<select name="kategorija">
					<option value="majice">majice</option>
					<option value="spodnje perilo">spodnje perilo</option>
					<option value="hlace">hlace</option>
					<option value="pulovrji">pulovrji</option>
					<option value="dodatki">dodatki</option>
				</select>
				<br>
				<input type="submit" value="Dodaj izdelek"/>
				<br>
				<a href="kupuj.php">Vrni se na prvo stran</a>
			</form>
			
			<pre>
			
	</div>
	</body>

</html>