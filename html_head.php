<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<meta http-equiv="X-UA-Compatible" content="chrome=1">
		<title>Vprašalnik - SLOVENSKI PAREMIOLOŠKI OPTIMUM</title>
		<meta name="description" content="Raziskava v okviru doktorske disertacije Primerjava paremiologije v slovenskem in slovaškem jeziku na osnovi paremiološkega optimuma.">
		<meta name="keywords" content="vprašalnik, anketa, matej, meterc, pregovori, doktorat, primerjava paremiologije v slovenskem in slovaškem jeziku na osnovi paremiološkega optimuma, slovenščina, slovaščina, slovensko, slovaško, primerjava, jezik, seznam pregovorov">
		<link rel="stylesheet" href="stil.css" type="text/css">
	</head>
<body bgcolor="#D4D0C7" topmargin="0" leftmargin="0" dir="ltr">
<script type="text/javascript" src="nasveti.js"></script>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
	<tbody>
	<tr style="width: 100%; height: 50px;" class="tabela_zelena">
		<td align="center">
		<font class="pisava_normal">
		Vprašalnik o poznavanju in razumevanju pregovornih enot (paremij) za<br>
		</font>
		<a href="?" class="pisava_naslov">
		SLOVENSKI PAREMIOLOŠKI OPTIMUM	
		</a><br>
		<font class="pisava_mala">
		Raziskava v okviru doktorske disertacije Primerjava paremiologije v slovenskem in slovaškem jeziku na osnovi paremiološkega optimuma	
		</font>
		</td>
	</tr>
<?php  
if (isset($_SESSION['id_user']) AND $_SESSION['id_user'] > 0) {
	#dobi statistiko
	$mysql_ukaz = "SELECT COUNT(vrstni_red) FROM pregovori_resevalci WHERE resevalec = $_SESSION[id_user] AND odgovor IS NULL";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$vrstica_null = mysql_fetch_row($mysql_zapis);	
	$mysql_ukaz = "SELECT COUNT(vrstni_red) FROM pregovori_resevalci WHERE resevalec = $_SESSION[id_user]";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$vrstica_all = mysql_fetch_row($mysql_zapis);	
	#reseni = vsi - null
	$reseni = $vrstica_all[0] - $vrstica_null[0];	
	if ($_GET['odgovor'] == '0N') {
		$reseni = $reseni  + 1;
	}
	#50% = 100 -> dobi procente / 2
	$procent_reseni = round(($reseni/$vrstica_all[0])*100,1);
	$procent_null = round(($vrstica_null[0]/$vrstica_all[0])*100,1);
	#size
	$size_null = round($procent_null/2);
	$size_reseno = round($procent_reseni/2);
	if ($procent_reseni < 100 AND $size_reseno == 50) {
		$size_null = 1;
		$size_reseno = 49;
	}
	if ($procent_null < 100 AND $size_null == 50) {
		$size_reseno = 1;
		$size_null = 49;
	}	
	#seznam ali posamezno?
	if ($_GET['akcija'] == "seznam") {
		$seznam_vn_12 = '<a href="?"><img border="0" src="naslednji.png" style="position: relative; top: 4px; left: -1px; z-index: 3;" width="16" height="16"></a><a href="?" class="pisava_mala">naslednje vprašanje</a>';		
	}
	else {
		$seznam_vn_12 = '<a href="?akcija=seznam"><img border="0" src="seznam.png" style="position: relative; top: 4px; left: -1px; z-index: 3;" width="16" height="16"></a><a href="?akcija=seznam" class="pisava_mala">pregled seznama</a>';
	}
	#vn
	echo <<<AsftzM
	<tr style="width: 100%;" class="tabela_siva">
		<td align="left">   
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
	<tr>
		<td style="vertical-align: middle;" width="28"><font class="pisava_mala"><a href="?"><img width="24" height="24" onmouseover="Tip('Osnovni pogled vprašalnika - naslednje neodgovorjeno vprašanje!')" style="position: relative; top: 3px; left: 0px; z-index: 3;" src="domov.png" border="0"></a></font>
		</td>
		<td style="vertical-align: middle;"><font class="pisava_mala">Koda: $_SESSION[koda_user]</font>
		</td>
		<td style="vertical-align: middle;"><font class="pisava_mala">Status: $reseni/$vrstica_all[0] <img src="zeleno.png" border="0" onmouseover="Tip('Rešeno že $procent_reseni% vprašalnika')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$size_reseno%" height="16"><img src="rdece.png" onmouseover="Tip('Preostalo še $procent_null% vprašalnika')" border="0" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$size_null%" height="16"> | <b>$seznam_vn_12</b></font>
		</td>
		<td style="vertical-align: middle;" align="right"><a class="pisava_mala" href="index.php?akcija=odjava">odjava</a> <a href="index.php?akcija=odjava"><img border="0" onmouseover="Tip('Kliknite za odjavo uporabnika!')" style="position: relative; top: 3px; left: 0px; z-index: 3;" src="odjava.png" width="18" height="18"></a>
		</td>
		</tr>
	</tbody>
</table>   
   
	</td>
	</tr>
	<tr style="width: 100%; height: 5px;" class="tabela_zelena">
		<td align="center">
		</td>
	</tr>	
	<tr style="width: 100%; height: 10px;" class="tabela_siva">
		<td align="left">   
	</td>
	</tr>	
AsftzM;
}
else {
	echo <<<AsftzM
	<tr style="width: 100%; height: 10px;" class="tabela_siva">
		<td align="left">   
	</td>
	</tr>

AsftzM;
}
?>

	</tr>
		<tr style="width: 100%; height:" class="tabela_siva">
		<td align="left">
