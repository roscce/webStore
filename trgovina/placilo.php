<?php
session_start();
	if(!isset($_SESSION['ID_uporabnika'])) header("Location:login.php");

?>
<html>
	<head>

	</head>
	<style>
	div{
			background-color:#8e9199;
			font-family:Tahoma, Geneva, sans-serif;
			font-size:1.2em;
			margin: auto;
			width: 40em;
			padding-left:25em;
			margin-top:2em;
			padding-top:3em;
			padding-bottom:3em;
			
		}
	p{
		margin:0.01em;
	}
	body {margin: auto;
		background-color:#b7b9bc;}
	.d {
		display:none;margin-top:1px;
		margin-left:33px;
		color:red; 
		font-size:14px;
	}
	</style>
	<body>
		<?php
		require_once "funkcije.php";
		$tab=get_podatki($_SESSION['ID_uporabnika']);
		echo '<div>';
			echo '<p>Ime: '.$tab['ime']; echo '</p><br>';
			echo '<p> Priimek: '.$tab['priimek'];echo '</p><br>';
			echo '<p>Naslov: '.$tab['naslov'];echo '</p><br>';
			echo '<p>Naslov prejemanja: <input type="text"/>';echo '</p><br>';
			echo '<p>Številka TRR-ja: <input type="text" oninput="preveri("trr")" id="trr"/>';echo '</p><br>';
			echo '<p id="demo" class="d">Stevilo more vsebovati 15 znakov</p>';
			echo '<p>Za plaèati: '.$_SESSION['koncni_znesek'].'EUR';echo '</p><br>'; unset($_SESSION['koncni_znesek']);
			echo '<button onclick="bravo()">Potrdi plaèilo</button>'; echo '<br>';  echo '<br>';  echo '<br>';
			echo '<a href="kupuj.php">Vrni se na prvo stran</a><br>';
		echo '</div>';
		?>
	</body>
	<script type="text/javascript">
		function bravo()
		{
			alert("Uspešno opravljen nakup!");
		}
		function preveri(y) {
		x = document.getElementById(y).value;
		console.log(x);
		if(y=="trr")
		{	
			if(x.length!=15) document.getElementById("demo").style.display="block";
			else document.getElementById("demo").style.display="none";
		}

}
	</script>
</html>