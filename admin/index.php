<?php
#osnovne spremenljivke
error_reporting(0);

#mysql spremenljivke
$mysql_streznik = "localhost";
$mysql_uporabnik = "root";
$mysql_geslo = "";
$mysql_baza_default = "meterc_vprasalnik";
if (isset($_SESSION['db'])) {
	$mysql_baza = $_SESSION['db'];
}
else {
	$mysql_baza = $mysql_baza_default;
}

#zacni seje
session_start();

#baza se 1x
if (isset($_SESSION['db'])) {
	$mysql_baza = $_SESSION['db'];
}
else {
	$mysql_baza = $mysql_baza_default;
}

#glava
include('head.php');

#povezi na bazo
$mysql_povezava = mysql_connect($mysql_streznik,$mysql_uporabnik,$mysql_geslo) or die ("Ne morem se povezati na MySQL bazo!");
mysql_select_db($mysql_baza);
mysql_query("SET CHARACTER SET UTF8");

#akcije
if ($_SESSION['admin'] == 1) { //prijava je
	#po vrstah
	if ($_GET['akcija'] == '1234') {
		
	}
	elseif ($_GET['akcija'] == 'odjava') {
		$_SESSION['admin'] = 0;	
		$_SESSION['spol'] = '';
		$_SESSION['odrascal'] = '';
		$_SESSION['zivi'] = '';	
		$_SESSION['reseno_min'] = '';
		$_SESSION['reseno_max'] = '';
		$_SESSION['rojen_min'] = '';
		$_SESSION['rojen_max'] = '';		
		$_SESSION['izobrazba_min'] = '';
		$_SESSION['izobrazba_max'] = '';		
				echo <<<PjsadaWE2
<script name="js1">
setTimeout("odjava()",1500);
function odjava() {
	location.href = 'index.php';
}
</script>
Odjava uspešna ...
PjsadaWE2;
	}
	elseif ($_GET['akcija'] == 'res_d') {
		include('resevalci_po_dnevih.php');
	}	
	elseif ($_GET['akcija'] == 'res_sez') {
		include('resevalci_seznam.php');
	}	
	elseif ($_GET['akcija'] == 'vpr_d') {
		include('vprasalniki_po_dnevih.php');
	}		
	elseif ($_GET['akcija'] == 'vpr_pos') {
		include('vprasalniki_en.php');
	}	
	elseif ($_GET['akcija'] == 'vpr_sez') {
		include('vprasalniki_seznam.php');
	}	
	elseif ($_GET['akcija'] == 'vpr_sez_100') {
		include('vprasalniki_seznam_100.php');
	}		
	elseif ($_GET['akcija'] == 'dpd_sez') {
		include('dodatna_vprasanja.php');
	}							
	else { //osnovna stran - skupni podatki
		include('osnovna_statistika.php');
	}
}
else { //prijave ni
	#prijava
	if ($_POST['login'] == '0N' AND strlen($_POST['usr']) > 3 AND strlen($_POST['pass']) > 3) {
		#preveri v bazi - SAMO glavna
		mysql_select_db($mysql_baza_default);
	 	$mysql_ukaz = "SELECT id FROM admin WHERE uporabnik LIKE '$_POST[usr]' AND geslo = SHA1('$_POST[pass]')";
	 	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	 	$user_jeni = mysql_fetch_row($mysql_zapis); 		
		#login
		if ($user_jeni[0] > 0) {
			$_SESSION['db'] = $_POST['db'];
			$_SESSION['admin'] = 1;
			$_SESSION['user'] = $user_jeni[0];			
			#OUT
			echo <<<PjsadaWE2
<script name="js1">
setTimeout("odjava()",1500);
function odjava() {
	location.href = 'index.php';
}
</script>
Prijava uspela! Nalagam vmesnik ...
PjsadaWE2;
		}
		else {
			#napacna prijava - odjavi
			echo <<<PjsadaWE2
<script name="js1">
setTimeout("odjava()",1500);
function odjava() {
	location.href = 'index.php';
}
</script>
Neuspešna prijava! Poskusite ponovno ...
PjsadaWE2;
		}
	}
	else {
		//seznam baz za prijavo
		$mysql_ukaz = "show databases LIKE '%$mysql_baza_default%'";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
		while ($baze = mysql_fetch_array($mysql_zapis)) {
			$vse_baze_vn = $vse_baze_vn."<option value='$baze[0]'>$baze[0]</option>";
		}
		//vn
		echo <<<Afg_gorm
<form action='index.php' method='POST'>
<input type='hidden' name='login' value='0N'>Prijava:<br>
U:<input type='text' name='usr'><br>
G:<input type='password' name='pass'><br>
DB: <select name='db'>$vse_baze_vn</select>
<br><input type='submit' name='sub' value='prijavi me'>
</form>
Afg_gorm;
	}
}

#rit
include('rit.php');

#izkjuci povezavo z bazo
mysql_close($mysql_povezava);

?>