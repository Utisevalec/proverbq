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

#seznam resevalcev
$mysql_ukaz = "SELECT id FROM resevalci WHERE vnesen = '0000-00-00 00:00:00'";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
while ($resevalci_22 = mysql_fetch_assoc($mysql_zapis)) {
	$mysql_ukazz = "SELECT cas FROM pregovori_resevalci WHERE resevalec = $resevalci_22[id] AND cas != '0000-00-00 00:00:00' ORDER BY cas ASC LIMIT 1";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$datum_pravi = mysql_fetch_row($mysql_rezultatp);
	echo "$resevalci_22[id] -> $datum_pravi[0]<br>";
	$mysql_ukazz = "UPDATE resevalci SET vnesen = '$datum_pravi[0]' WHERE id = $resevalci_22[id] LIMIT 1";
	$mysql_rezultatp = mysql_query($mysql_ukazz);	
}

#izkjuci povezavo z bazo
mysql_close($mysql_povezava);

?>