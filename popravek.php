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

//if odgovor je 0N
$onload = "";
if ($_GET['odgovor'] == "0N" AND $_GET['preg'] > 0 AND $_GET['vrednost'] > 0) {
	#shrani
	$mysql_ukaz = "UPDATE pregovori_resevalci SET odgovor = $_GET[vrednost], cas = NOW() WHERE pregovor = $_GET[preg] AND resevalec = $_SESSION[id_user]";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	#pobrisi varinato
	$mysql_ukaz = "DELETE FROM pregovori_variante WHERE uporabnik = $_SESSION[id_user] AND pregovor = $_GET[preg]";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	#ce je odgovor 5 in je txt daljsi od 5 nzakov shrani se varianto
	if ($_GET['vrednost'] == 5 AND strlen($_GET['vari']) > 5) {
		$_GET['vari'] = addslashes($_GET['vari']);
		#shrani
		$mysql_ukaz = "INSERT INTO pregovori_variante(uporabnik,pregovor,varianta,cas) VALUES($_SESSION[id_user],$_GET[preg],'$_GET[vari]',NOW())";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	}
	#on load - close
	$onload = "alert('Odgovor je bil uspešno spremenjen!');window.close();window.opener.location.reload();";
}


//main part vprasalnika
$mysql_ukaz = "SELECT p.pregovor, p.id FROM pregovori as p, pregovori_resevalci as pr WHERE pr.resevalec = $_SESSION[id_user] AND p.id = $_GET[preg] AND pr.odgovor IS NOT NULL AND pr.pregovor = p.id LIMIT 1";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
$vrstica = mysql_fetch_row($mysql_zapis);

#ce je
if (isset($vrstica[1])) {

#barva ozadja
$_SESSION['div_color'] = 1;


//out
echo <<<AsasttZu89
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
<body bgcolor="#D4D0C7" onload="$onload" topmargin="0" leftmargin="0" dir="ltr">
<script name="js_2">
function check_input(tekst) {
	dolzina = tekst.length;
	if (dolzina > 5) {
		//vse ok
		location.href = 'popravek.php?akcija=none&odgovor=0N&vrednost=5&preg=$vrstica[1]&vari='+tekst;
	}
	else {
		//napaka dolzine
		alert('V polje varianta vpišite več kot 5 znakov dolg odgovor!');
	}
}
</script>
<form name="vprasalnik_form">
<font class="pisava_normal">
<div align="center" style="width: 100%;">
	<div id="vprasanje_div" style="width: 90%;" class="div_vprasanje_$_SESSION[div_color]">
	<br><font class="pisava_naslov">$vrstica[0]</font><br><br>
<div align="center">
<table style="text-align: left;" border="0" cellpadding="2" cellspacing="2">
	<tbody>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').setAttribute('readonly',1);document.getElementById('varianta_id').value = ''; location.href = 'popravek.php?akcija=none&odgovor=0N&vrednost=1&preg=$vrstica[1]';" class="obrazec_radio" type="radio" name="odgovor" value="1">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="popravek.php?akcija=none&odgovor=0N&vrednost=1&preg=$vrstica[1]" class="pisava_normal">poznam in uporabljam</font>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').setAttribute('readonly',1);document.getElementById('varianta_id').value = ''; location.href = 'popravek.php?akcija=none&odgovor=0N&vrednost=2&preg=$vrstica[1]';" class="obrazec_radio" type="radio" name="odgovor" value="2">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="popravek.php?akcija=none&odgovor=0N&vrednost=2&preg=$vrstica[1]" class="pisava_normal">poznam, a ne uporabljam</a>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').setAttribute('readonly',1);document.getElementById('varianta_id').value = ''; location.href = 'popravek.php?akcija=none&odgovor=0N&vrednost=3&preg=$vrstica[1]';" class="obrazec_radio" type="radio" name="odgovor" value="3">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="popravek.php?akcija=none&odgovor=0N&vrednost=3&preg=$vrstica[1]" class="pisava_normal">ne poznam, a razumem</a>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').setAttribute('readonly',1);document.getElementById('varianta_id').value = ''; location.href = 'popravek.php?akcija=none&odgovor=0N&vrednost=4&preg=$vrstica[1]';" class="obrazec_radio" type="radio" name="odgovor" value="4">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="popravek.php?akcija=none&odgovor=0N&vrednost=4&preg=$vrstica[1]" class="pisava_normal">ne poznam in ne razumem</a>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').removeAttribute('readonly',1); document.vprasalnik_form.varianta.focus();" class="obrazec_radio" type="radio" id="odgovor_id_5" name="odgovor" value="5">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="#" onclick="document.getElementById('varianta_id').removeAttribute('readonly',1); document.vprasalnik_form.varianta.focus();getElementById('odgovor_id_5').checked = true;" class="pisava_normal">varianta:</a> <input type="text" id="varianta_id" onClick="getElementById('odgovor_id_5').checked = true;document.getElementById('varianta_id').removeAttribute('readonly',1);" readonly name="varianta" value="" size="18" class="obrazec_normal"> <input type="button" name="t5" onclick="check_input(document.vprasalnik_form.varianta.value)" value="OK" class="obrazec_normal">
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><font class="pisava_mala">Ko kliknete na ustrezen odgovor se vam bo avtomatično naložilo novo vprašanje, če izberete "varianto" vpišite besedilo v polje in kliknite na gumb "ok" za potrditev!</font>
		</td>
	</tr>				
	</tbody>
</table>
</div>
<br>
	</div>
</div>
</font>
</form>
</body>
</html>
AsasttZu89;

}
else {
	echo "Neznana napaka!";
}

#izkjuci povezavo z bazo
mysql_close($mysql_povezava);
?>