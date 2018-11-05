<?php
session_start();
require_once "funkcije.php";



$check=0;
if(!isset($_SESSION['tabela_kosarice'])) 
	{
		$tab[]=$_GET['id_izdelek'];
		$_SESSION['tabela_kosarice']=$tab;
	}
	
	
	foreach($_SESSION['tabela_kosarice'] as $v)
		if($v==$_GET['id_izdelek']) $check=1;
		
	if($check==0)
	{$tmp=$_GET['id_izdelek'];
	$tab=$_SESSION['tabela_kosarice'];

	$x=zdruzi($tab,$tmp);
	unset($_SESSION['tabela_kosarice']);
	$_SESSION['tabela_kosarice']=$x;}
	
	echo '<pre>';
	print_r($_SESSION['tabela_kosarice']);
	echo '<pre>';
	header("location:kupuj.php");


?>