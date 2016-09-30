<?php
#osnovne spremenljivke
error_reporting(0);

#mysql spremenljivke
$mysql_streznik = "localhost";
$mysql_uporabnik = "root";
$mysql_geslo = "";
$mysql_baza = "meterc_vprasalnik";

#zacni seje
session_start();

#povezi na bazo
$mysql_povezava = mysql_connect($mysql_streznik,$mysql_uporabnik,$mysql_geslo) or die ("Ne morem se povezati na MySQL bazo!");
mysql_select_db($mysql_baza);
mysql_query("SET CHARACTER SET UTF8");

#izpisi glavo
include('html_head.php');

#preveri ce je session userja settan
if (isset($_SESSION['id_user']) AND $_SESSION['id_user'] > 0) {
	if ($_GET['akcija'] == 'odjava') { //odjava
		#odjava
		unset($_SESSION['id_user']);
		include('odjava.php');
	}
	elseif ($_GET['akcija'] == 'vnos_extra') {
		#dodatno
		include('vnos_extra.php');
	}
	elseif ($_GET['akcija'] == 'seznam') {
		#dodatno
		include('seznam.php');
	}	
	elseif ($_GET['akcija'] == 'info') {
		#about
		include('o_vprasalniku.php');
	}	
	else {
		#user je postavljen odpri mu njegovo stran
		include('resevanje.php');		
		//echo "user stran, id: $_SESSION[id_user]";
	}
}
else {
	#ce je akcija
	if ($_GET['akcija'] == "nov") {
		#user ni postavljen in akcija je nov - daj mu stran za registracijo
		include('registracija.php');
	}
	elseif ($_GET['akcija'] == 'prijava') {
		#user ni postavljen in akcija je prijava - daj mu prijavno stran
		include('prijava.php');
	}
	elseif ($_GET['akcija'] == 'info') {
		#about
		include('o_vprasalniku.php');
	}		
	elseif ($_GET['akcija'] == 'prijava_in') {
		#user ni postavljen in akcija je prijava - preveri in prijavi
		include('prijava_in.php');
	}	
	else {
		#user ni postavljen in ni akcije - daj mu zacetno stran
		include('zacetna_stran.php');
	}
}

#izpisi rit
include('html_rep.php');


#izkjuci povezavo z bazo
mysql_close($mysql_povezava);

?>