<html>
	<head>
		<meta charset="UTF-8">
		<style>
			body{
				background-color:#b7b9bc;
			}
			div {
				background-color:white;
				height:6em;
				width:19em;
				margin: auto;
				padding: 1em;
				border: 1px solid black;
				margin-top:18em;
				background-color:#8e9199;
			}
		</style>
		
	</head>
	<body>
	<div>
		<form method="post" action="login.php">
		
			<span style="font-family:Tahoma, Geneva, sans-serif;">Uporabniško ime:
			<input type="text" name="upo"> <br>
			Geslo:
			<input type="password" name="g"> <br>
			<input type="submit" value="Prijava"> <br>
			<a href="nov_uporabnik.php"> Ustvari nov račun </a></span>
		
		<form>
	</div>
	</body>
	
</html>


<?php
	require_once 'funkcije.php';
	if(isset($_POST['upo']) && isset($_POST['g']))
	{
		login($_POST['upo'],$_POST['g']);
	}





?>