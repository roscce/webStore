<?php


function dodaj_uporabnika($ime, $priimek, $stac_tel, $gsm, $naslov, $posta, $email, $spol, $upo, $g)
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$k='SELECT uporabnisko_ime FROM login';
	$rs=mysqli_query($conn, $k);
	while(($tab[]=mysqli_fetch_assoc($rs))!=NULL); // while je brezveze kle k se itak lahko samo enkrat znajde v bazi
	$check=0;
	foreach($tab as $v)
		if($v['uporabnisko_ime']==$upo) {$check=1;trigger_error('Uporabnisko ime je ze v uporabi!',E_USER_NOTICE);}

	if($check==0)
	{
		//vnos v stranko---------------------------------------------------------
		$q='INSERT INTO stranka(ime, priimek, gsm, stacionarni_telefon, naslov, email, postna_stevilka, spol)
		VALUES("'.$ime.'","'.$priimek.'","'.$gsm.'","'.$stac_tel.'","'.$naslov.'","'.$email.'",'.$posta.',"'.$spol.'")';
		mysqli_query($conn,$q);
		
		//vnos v login------------------------------------------------------------
		
		$q='INSERT INTO login(uporabnisko_ime, geslo) VALUES("'.$upo.'","'.$g.'")';
		mysqli_query($conn,$q) or die('Napaka pri prenosu v login');
		
		//prenos idja iz logina v stranko-------------------------------------------
		$q="SELECT ID_uporabnika FROM login WHERE Uporabnisko_ime='{$upo}'";
		$rs = mysqli_query($conn,$q);
        $tab = mysqli_fetch_array($rs);
       
        $vr=$tab['ID_uporabnika'];
        
        $q="
        SELECT id_stranke FROM stranka 
        ORDER BY id_stranke DESC
        LIMIT 1";
        
        $rs = mysqli_query($conn,$q);
        
        $tmp=mysqli_fetch_array($rs);
        
        $tmp = $tmp[0];
        
        
        $q="UPDATE stranka SET id_uporabnika='{$vr}' 
        WHERE id_stranke ='{$tmp}'";
        
		mysqli_query($conn,$q) or die('Napaka pri prenosu idja');
		
		
		unset($_GET);
        
        mysqli_close($conn);
        
	}
		
}

//----------------------------------------------------------------------------------------------------------------

function login($upo, $g)
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	$q="SELECT * FROM login";
	$rs=mysqli_query($conn,$q) or die('Napaka pri prenosu podatkov uporabnika');
	while($tab[]=mysqli_fetch_assoc($rs));
	foreach($tab as $v)
		if($v['Uporabnisko_ime']==$upo && $v['geslo']==$g)
		{
			session_start();
			$_SESSION['ID_uporabnika']=$v['ID_uporabnika'];
			$_SESSION['uporabnisko_ime']=$v['Uporabnisko_ime'];
			$_SESSION['geslo']=$v['geslo'];
			
			//ko ga najdemo gremo v drugo datoteko
			header('location:kupuj.php');
		}
		
			echo '<script language="javascript">';
			echo 'alert("Napačno uporabniško ime ali geslo!")';
			echo '</script>';
			
		
}

//-------------------------tabela za podatki.php--------------------------

function get_podatki($id)
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$q="SELECT ime, priimek, gsm, stacionarni_telefon, naslov, email, postna_stevilka, spol 
		FROM stranka
		WHERE ID_uporabnika=".$id;
	$rs=mysqli_query($conn,$q) or die('Napaka pri prenosu podatkov stranke');
	$tab=mysqli_fetch_assoc($rs);
	
	return $tab;
	
}

//--------------------------------dodajanje izdelkov v tabelo izdelki-----------------------------------

function dodaj_izdelek($naziv, $opis, $cena, $kategorija, $slika)
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$q="SELECT * FROM kategorija";
	$rs=mysqli_query($conn, $q) or die ('Napaka pri pridobivanju kategorij');
	while($tab[]=mysqli_fetch_assoc($rs));
	$id_kat=0;
	foreach($tab as $v)
	if($v['im_kategorije']==$kategorija) $id_kat=$v['ID_kategorije'];
	
	if($id_kat!=0)
	{
	$q="INSERT INTO izdelek(naziv, opis, cena, id_kategorije,slika)
		VALUES('".$naziv."','".$opis."', ".$cena.",".$id_kat.",'".$slika."')";
	mysqli_query($conn,$q) or die('Napaka pri vnosu v izdelke');
	}
	else echo 'ni nasel primernega id-ja';
}

//-----------------------------polnjennje glavne strani------------------

function tabela_izdelkov()
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$q="SELECT naziv, opis, cena, id_izdelek, slika FROM izdelek";
	$rs=mysqli_query($conn, $q) or die ('Napaka pri pridobivanju izdelkov za tabelo');
	while($tab[]=mysqli_fetch_assoc($rs));
	
	
	$q="SELECT count(id_izdelek) FROM izdelek";
	$rs=mysqli_query($conn, $q) or die ('Napaka pri štetju izdelkov');
	$s=mysqli_fetch_assoc($rs);
	$stevec=$s['count(id_izdelek)'];

	
	
	for($i=0;$i<$stevec;$i++)
	{	
		echo '<div class="izdelek">';
			echo '<p style="font-size:1.1em;">'.$tab[$i]['naziv'].'<p>';
			echo '<img style="display:block;margin: 0 auto;max-width:20em; height:10em;" 
					src="'.$tab[$i]['slika'].'" />';
			echo '<p>'.$tab[$i]['opis'];
			echo '<br>'.$tab[$i]['cena'].' EUR</p>';
			echo '<span style="float:right">
			<a href="dodaj_v_kosarico.php?id_izdelek='.$tab[$i]['id_izdelek'].'">V košarico</a>
			</span>';
		echo '</div>';
	}
}

//------------------------------------funkcija za zdruzevanje tabel pri dodaj_v kosarico--------------------
function zdruzi($tab1, $tmp)
{
	foreach($tab1 as $v) $tab[]=$v;
	$tab[]=$tmp;
	
	return $tab;
}

//----------------------------------------------------------------------------------------------------

function get_izdelke()
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$q="SELECT ID_izdelek, naziv, opis, cena FROM izdelek";
	$rs=mysqli_query($conn,$q);
	while($tab[]=mysqli_fetch_assoc($rs));
	
	return $tab;
}



//-----------------------------------------dodajanje nakupov---------------------------------------

function dodaj_nakup($st_kosov, $id_i)
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$idu=$_SESSION['ID_uporabnika'];
	$q="SELECT id_stranke FROM stranka WHERE id_uporabnika=".$idu;
	$rs=mysqli_query($conn,$q)or die ('Napaka pri dobivanju idja stranke');
	$tab=mysqli_fetch_assoc($rs);
	$id_s=$tab['id_stranke'];
	
	if($id_i!=0)
	{
		$q="SELECT * FROM izdelek WHERE id_izdelek=".$id_i;
		$rs=mysqli_query($conn,$q) or die ('Napaka pri prenosu podatkov izdelka');
		$tab=mysqli_fetch_assoc($rs);
		$cena=$st_kosov*$tab['cena'];
		
		if(!isset($_SESSION['check_za_nakup']))
		{	
			//ta stavek se lahko izvrsi samo enkrat
			$q="INSERT INTO nakup(id_stranke) VALUES(".$id_s.")";
			echo $q;
			mysqli_query($conn,$q) or die ('Napaka pri prenosu podatkov v nakup');
			
			$_SESSION['check_za_nakup']=1;
		}
		
		$q="SELECT * FROM Nakup ORDER BY datum_nakupa DESC LIMIT 1";
		$rs=mysqli_query($conn,$q) or die ('Napaka pri pridobivanju kljuca nakupa');
		$tab=mysqli_fetch_assoc($rs);
		
		$q="INSERT INTO postavka(id_izdelka, id_nakupa, stevilo_kosov,cena) 
			VALUES (".$id_i.",".$tab['ID_nakupa'].",".$st_kosov.",".$cena.")";
		mysqli_query($conn,$q) or die ('Napaka pri prenosu podatkov v postavko');
		
		
		
		
	}
}

//-----------------------------------------------------------------------------------------------------------
function dodaj_koncni_znesek()
{	
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$q="select * from nakup order by datum_nakupa desc limit 1";
	$rs=mysqli_query($conn,$q) or die ('Napaka pri prenosu podatkov iz nakupa');
	$tab=mysqli_fetch_assoc($rs);
	
	$q="SELECT * FROM postavka WHERE id_nakupa=".$tab['ID_nakupa'];
	$rs=mysqli_query($conn,$q) or die ('Napaka pri prenosu podatkov iz nakupa');
	while($tabela[]=mysqli_fetch_assoc($rs))echo 'shranjujem';
	$vsota=0.0;
	foreach($tabela as $v)
		$vsota=$vsota+floatval($v['cena']);

	 $_SESSION['koncni_znesek']=$vsota;
	 $q="UPDATE nakup SET znesek=".$vsota." WHERE id_nakupa=".$tab['ID_nakupa'];
	 mysqli_query($conn,$q) or die ('Napaka pri posodabljanju zneska');
	 unset($_SESSION['check_za_nakup']);
}

//---------------------------------------------------------------------------------------------------------
function podatki_nakupov()
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$idu=$_SESSION['ID_uporabnika'];
	$q="SELECT id_stranke FROM stranka WHERE id_uporabnika=".$idu;
	$rs=mysqli_query($conn,$q)or die ('Napaka pri pridobivanju idja stranke');
	$tab=mysqli_fetch_assoc($rs);
	$id_s=$tab['id_stranke'];
	
	$q="SELECT p.* FROM postavka p
		JOIN nakup n ON n.id_nakupa=p.id_nakupa
		WHERE id_stranke=".$id_s;
	$rs=mysqli_query($conn,$q) or die ('Napaka pri prenosu podatkov o nakupih stranke');
	while($postavka[]=mysqli_fetch_assoc($rs));
	
	$q="SELECT * FROM nakup WHERE id_stranke=".$id_s;
	$rs=mysqli_query($conn,$q) or die ('Napaka pri prenosu izdelkov');
	while($nakupi[]=mysqli_fetch_assoc($rs));
	if(count($nakupi)>1)
	{unset($nakupi[count($nakupi)-1]);
	
	$q="SELECT * FROM izdelek";
	$rs=mysqli_query($conn,$q) or die ('Napaka pri prenosu izdelkov');
	while($izdelki[]=mysqli_fetch_assoc($rs));
	
	foreach($nakupi as $nakup)
	{
	echo '<div class="zgodovina">';
	echo'<p> <strong>ID računa:</strong> '.$nakup['ID_nakupa'].' <span style="float:right"> '.$nakup['datum_nakupa'].' </span></p>
		<br>';
	echo '<table>';
	echo	'<tr> 
			<th style="text-align:left">Ime izdelka</th>
			<th style="text-align:center">kol</th>
			<th style="text-align:center">cena</th>
			</tr>';

		foreach($postavka as $pos)
			if($pos['ID_nakupa']==$nakup['ID_nakupa'])
		{
			echo '<tr>';
			foreach($izdelki as $izdelek)
			if($izdelek['ID_izdelek']==$pos['ID_izdelka'])
			echo '<td style="text-align:left">'.$izdelek['Naziv'].'</td>';
		
			echo '<td style="text-align:center">'.$pos['stevilo_kosov'].'</td>';
			echo '<td style="text-align:center">'.$pos['cena'].' EUR</td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '<p style="float:right; font-size:1.125em;margin-right:18px"><strong>Skupna cena: </strong>'.$nakup['znesek'].' EUR</p>';
	echo '<br>';
		echo '</div>';
	}
	}
	
	else 
	{
		echo '<div class="zgodovina"> <p>Nimate se zabeleženga nakupa</p> </div>';
	}
}

//-------------------------------------------posodabljanje podatkov stranke----------------------------------------

function update_uporabnika($ime, $priimek, $stac_tel, $gsm, $naslov, $posta, $email, $spol)
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$q="UPDATE stranka 
		SET ime='".$ime."'
		, priimek='".$priimek."'
		, Stacionarni_telefon=".$stac_tel."
		, gsm=".$gsm."
		, Naslov='".$naslov."'
		, Postna_stevilka='".$posta."'
		, email='".$email."'
		, spol='".$spol."'
		, Postna_stevilka='".$posta."'
	WHERE id_uporabnika=".$_SESSION['ID_uporabnika'];
	mysqli_query($conn,$q) or die ('Napaka pri spremembi podatkov stranke');
	
}

//----------------------------------------stranka preko id uporabnika------------------------------------------

function trenutna_stranka()
{
	$conn=mysqli_connect('localhost', 'root','', 'spletna_trgovinav2') or die('Napaka pri povezavi z bazo');
	
	$idu=$_SESSION['ID_uporabnika'];
	$q="SELECT * FROM stranka WHERE id_uporabnika=".$idu;
	$rs=mysqli_query($conn,$q)or die ('Napaka pri pridobivanju stranke');
	$tab=mysqli_fetch_assoc($rs);
	return $tab;
}

?>




