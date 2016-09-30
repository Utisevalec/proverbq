<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<meta http-equiv="X-UA-Compatible" content="chrome=1">
		<title>Vprašalnik - administracija</title>
	</head>
<body bgcolor="#D4D0C7" topmargin="0" leftmargin="0" dir="ltr">
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

#shrani?
if ($_POST['save'] == 1) {
	$vn = "Nastavitve filtrov so shranjene!";
	$_SESSION['spol'] = $_POST['spol'];
	$_SESSION['odrascal'] = $_POST['odrascal'];
	$_SESSION['zivi'] = $_POST['zivi'];	
	$_SESSION['reseno_min'] = $_POST['reseno_min'];
	$_SESSION['reseno_max'] = $_POST['reseno_max'];	
	$_SESSION['rojen_min'] = $_POST['rojen_min'];
	$_SESSION['rojen_max'] = $_POST['rojen_max'];		
	$_SESSION['izobrazba_min'] = $_POST['izobrazba_min'];
	$_SESSION['izobrazba_max'] = $_POST['izobrazba_max'];			
}
if ($_GET['ponastavi'] == 1) {
	$vn = "Nastavitve filtrov so ponastavljene!";
	$_SESSION['spol'] = '';
	$_SESSION['odrascal'] = '';
	$_SESSION['zivi'] = '';		
	$_SESSION['reseno_min'] = '';
	$_SESSION['reseno_max'] = '';	
	$_SESSION['rojen_min'] = '';
	$_SESSION['rojen_max'] = '';	
	$_SESSION['izobrazba_min'] = '';
	$_SESSION['izobrazba_max'] = '';			
}

#naredi seznam let rojstva
foreach (range(2008,1900) as $leto_vn) {
	$leto_rojstva_seznam = $leto_rojstva_seznam."<option value='$leto_vn'>$leto_vn</option>";
}


#vrni fromo glede na vrednosti
echo <<<EOF_DDD_tri
<script name="js_55">

setTimeout('set_val()',300);

function set_val() {
	document.test1.spol.value = '$_SESSION[spol]';
	document.test1.odrascal.value = '$_SESSION[odrascal]';
	document.test1.zivi.value = '$_SESSION[zivi]';
	document.test1.rojen_min.value = '$_SESSION[rojen_min]';
	document.test1.rojen_max.value = '$_SESSION[rojen_max]';
}
</script>
<form name="test1" action="?" method="POST">
<input type="hidden" name="save" value="1">
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
<tbody>
	<tr>
		<td style="vertical-align: top;">
			Spol:
		</td>
		<td style="vertical-align: top;">
			<select name="spol">
			<option value="">ni pomembno</option>
			<option value="m">moški</option>
			<option value="ž">ženska</option>
			</select>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: top;">
			Rojen (od-do):
		</td>
		<td style="vertical-align: top;">
			<select name='rojen_min'><option value="">ni pomembno</option>$leto_rojstva_seznam</select>-<select name='rojen_max'><option value="">ni pomembno</option>$leto_rojstva_seznam</select>
		</td>
	</tr>	
	<tr>
		<td style="vertical-align: top;">
			Stopnja izobrazbe (od-do):
		</td>
		<td style="vertical-align: top;">
			<input type="text" size="1" value="$_SESSION[izobrazba_min]" name="izobrazba_min">-<input type="text" size="1" value="$_SESSION[izobrazba_max]" name="izobrazba_max">
		</td>
	</tr>		
	<tr>
		<td style="vertical-align: top;">
			Rešenost vprašalnik (od-do):
		</td>
		<td style="vertical-align: top;">
			<input type="text" size="3" value="$_SESSION[reseno_min]" name="reseno_min">-<input type="text" size="3" value="$_SESSION[reseno_max]" name="reseno_max">
		</td>
	</tr>		
	<tr>
		<td style="vertical-align: top;">
			Odraščal:
		</td>
		<td style="vertical-align: top;">
			<select name="odrascal">
			<option value="">ni pomembno</option>
			<option value="gorenjska">Gorenjska narečna skupina</option>
     		<option value="dolenjska">Dolenjska narečna skupina z belokranjskimi narečji</option>      
     		<option value="stajerska">Štajerska narečna skupina</option>      
     		<option value="panonska">Panonska narečna skupina</option>      
     		<option value="koroska">Koroška narečna skupina</option>      
     		<option value="primorska">Primorska narečna skupina</option>      
     		<option value="rovtarska">Rovtarska narečna skupina</option>
		</select>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: top;">
			Trenutno prebivališče:
		</td>
		<td style="vertical-align: top;">
			<select name="zivi">
			<option value="">ni pomembno</option>
			<option value="gorenjska">Gorenjska narečna skupina</option>
     		<option value="dolenjska">Dolenjska narečna skupina z belokranjskimi narečji</option>      
     		<option value="stajerska">Štajerska narečna skupina</option>      
     		<option value="panonska">Panonska narečna skupina</option>      
     		<option value="koroska">Koroška narečna skupina</option>      
     		<option value="primorska">Primorska narečna skupina</option>      
     		<option value="rovtarska">Rovtarska narečna skupina</option>
		</td>
	</tr>				
	<tr>
		<td style="vertical-align: top;">
		</td>
		<td style="vertical-align: top;">
			<input type="submit" name="1" value="Shrani"> <input type="button" name="1" onClick="location.href = '?ponastavi=1'" value="Ponastavi"> <br>$vn
		</td>
	</tr>		
</tbody>
</table>
</form>
EOF_DDD_tri;


#izkjuci povezavo z bazo
mysql_close($mysql_povezava);
?>
<body>
</html>