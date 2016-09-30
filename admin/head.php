<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<meta http-equiv="X-UA-Compatible" content="chrome=1">
		<title>Vprašalnik - administracija</title>
		<meta name="description" content="Raziskava v okviru doktorske disertacije Primerjava paremiologije v slovenskem in slovaškem jeziku na osnovi paremiološkega optimuma.">
		<meta name="keywords" content="vprašalnik, anketa, matej, meterc, pregovori, doktorat, primerjava paremiologije v slovenskem in slovaškem jeziku na osnovi paremiološkega optimuma, slovenščina, slovaščina, slovensko, slovaško, primerjava, jezik, seznam pregovorov">
		<link rel="stylesheet" href="stil.css" type="text/css">
	</head>
<body bgcolor="#D4D0C7" topmargin="0" leftmargin="0" dir="ltr">
<script type="text/javascript" src="../nasveti.js"></script>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td width="200" style="vertical-align: top;">
<?php if ($_SESSION['admin'] == 1) { //prijava je ?>
SKUPNO<br>
- <a href="index.php?akcija=osnovno">osnovna statistika</a><br>
REŠEVALCI<br>
- <a href="index.php?akcija=res_d">po dnevih</a><br>
- <a href="index.php?akcija=res_sez">seznam</a><br>
VPRAŠALNIK<br>
- <a href="index.php?akcija=vpr_d">po dnevih</a><br>
- <a href="index.php?akcija=vpr_pos">pregled posamezno</a><br>
- <a href="index.php?akcija=vpr_sez">seznam vse</a><br>
- <a href="index.php?akcija=vpr_sez_100">seznam 100% rešeni</a><br>
DODATNA VPRAŠANJA<br>
-  <a href="index.php?akcija=dpd_sez">seznam</a><br>
OSTALO<br>
- <a href="?akcija=odjava">odjava</a>
<br><br>
<?php } //prijava je ?>
</td>
<td style="vertical-align: top;" align="center">

