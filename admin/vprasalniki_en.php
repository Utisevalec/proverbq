<?php

#osnovno
$mysql_ukaz = "SELECT pregovor FROM pregovori WHERE id = $_GET[pregovor] LIMIT 1";
$mysql_zapis = mysql_query($mysql_ukaz);
$pregovor = mysql_fetch_row($mysql_zapis);	

#dobi pregovore
$mysql_ukaz = "SELECT id, pregovor FROM pregovori ORDER BY pregovor ASC";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
while ($resevalci_2235 = mysql_fetch_assoc($mysql_zapis)) {
	#selected ali ne
	$sel_out = '';
	if ($resevalci_2235['id'] == $_GET['pregovor']) {
		$sel_out = 'selected';
	}
	#vn
	$pregovori_list = $pregovori_list."<option $sel_out value='$resevalci_2235[id]'>$resevalci_2235[pregovor]</option>";
}

#naredi filter - spol
$spol_filter = '%';
if (strlen($_SESSION['spol']) > 0) {
	$spol_filter = $_SESSION['spol'];
	$txt_spol = "spol: $_SESSION[spol],";
}
#naredi filter - odrascal
$odrascal_filter = '%';
if (strlen($_SESSION['odrascal']) > 0) {
	$odrascal_filter = $_SESSION['odrascal'];
	$txt_odrascal = "odraščal: $_SESSION[odrascal],";
}
#naredi filter - zivi
$zivi_filter = '%';
if (strlen($_SESSION['zivi']) > 0) {
	$zivi_filter = $_SESSION['zivi'];
	$txt_zivi = "trenutno prebivališče: $_SESSION[zivi],";
}
#naredi filter - rojen min
$rojen_min_filter = '1800';
if ($_SESSION['rojen_min'] > 0) {
	$rojen_min_filter = $_SESSION['rojen_min'];
	$txt_rojen_min = "rojen od: $_SESSION[rojen_min],";
}
#naredi filter - rojen max
$rojen_max_filter = '2012';
if ($_SESSION['rojen_max'] > 0) {
	$rojen_max_filter = $_SESSION['rojen_max'];
	$txt_rojen_max = "rojen do: $_SESSION[rojen_max],";
}
#naredi filter - reseno min
$reseno_min_filter = '0';
if (strlen($_SESSION['reseno_min']) > 0) {
	$reseno_min_filter = $_SESSION['reseno_min'];
	$txt_reseno_min = "rešeno od: $_SESSION[reseno_min],";
}
$reseno_max_filter = '100';
if (strlen($_SESSION['reseno_max']) > 0) {
	$reseno_max_filter = $_SESSION['reseno_max'];
	$txt_reseno_max = "rešeno do: $_SESSION[reseno_max],";
}
#naredi filter - izobrazba min
$izobrazba_min_filter = '1';
if (strlen($_SESSION['izobrazba_min']) > 0) {
	$izobrazba_min_filter = $_SESSION['izobrazba_min'];
	$txt_izobrazba_min = "izobrazba od: $_SESSION[izobrazba_min],";
}
#naredi filter - izobrazba max
$izobrazba_max_filter = '8';
if (strlen($_SESSION['izobrazba_max']) > 0) {
	$izobrazba_max_filter = $_SESSION['izobrazba_max'];
	$txt_izobrazba_max = "izobrazba do: $_SESSION[izobrazba_max],";
}

#odgovor 1
$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $_GET[pregovor] AND pr.odgovor = 1 AND re.spol LIKE '$spol_filter' AND re.odrascal LIKE '$odrascal_filter' AND re.zivi LIKE '$zivi_filter' AND re.rojen >= $rojen_min_filter AND re.rojen <= $rojen_max_filter AND re.reseno >= $reseno_min_filter AND re.reseno <= $reseno_max_filter AND re.izobrazba >= $izobrazba_min_filter AND re.izobrazba <= $izobrazba_max_filter AND re.id = pr.resevalec";
$mysql_rezultatp = mysql_query($mysql_ukazz);
$odgovor_1 = mysql_fetch_row($mysql_rezultatp);	
#odgovor 2
$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $_GET[pregovor] AND pr.odgovor = 2 AND re.spol LIKE '$spol_filter' AND re.odrascal LIKE '$odrascal_filter' AND re.zivi LIKE '$zivi_filter' AND re.rojen >= $rojen_min_filter AND re.rojen <= $rojen_max_filter AND re.reseno >= $reseno_min_filter AND re.reseno <= $reseno_max_filter AND re.izobrazba >= $izobrazba_min_filter AND re.izobrazba <= $izobrazba_max_filter AND re.id = pr.resevalec";
$mysql_rezultatp = mysql_query($mysql_ukazz);
$odgovor_2 = mysql_fetch_row($mysql_rezultatp);	
#odgovor 3
$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $_GET[pregovor] AND pr.odgovor = 3 AND re.spol LIKE '$spol_filter' AND re.odrascal LIKE '$odrascal_filter' AND re.zivi LIKE '$zivi_filter' AND re.rojen >= $rojen_min_filter AND re.rojen <= $rojen_max_filter AND re.reseno >= $reseno_min_filter AND re.reseno <= $reseno_max_filter AND re.izobrazba >= $izobrazba_min_filter AND re.izobrazba <= $izobrazba_max_filter AND re.id = pr.resevalec";
$mysql_rezultatp = mysql_query($mysql_ukazz);
$odgovor_3 = mysql_fetch_row($mysql_rezultatp);	
#odgovor 4
$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $_GET[pregovor] AND pr.odgovor = 4 AND re.spol LIKE '$spol_filter' AND re.odrascal LIKE '$odrascal_filter' AND re.zivi LIKE '$zivi_filter' AND re.rojen >= $rojen_min_filter AND re.rojen <= $rojen_max_filter AND re.reseno >= $reseno_min_filter AND re.reseno <= $reseno_max_filter AND re.izobrazba >= $izobrazba_min_filter AND re.izobrazba <= $izobrazba_max_filter AND re.id = pr.resevalec";
$mysql_rezultatp = mysql_query($mysql_ukazz);
$odgovor_4 = mysql_fetch_row($mysql_rezultatp);	
#odgovor 5
$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $_GET[pregovor] AND pr.odgovor = 5 AND re.spol LIKE '$spol_filter' AND re.odrascal LIKE '$odrascal_filter' AND re.zivi LIKE '$zivi_filter' AND re.rojen >= $rojen_min_filter AND re.rojen <= $rojen_max_filter AND re.reseno >= $reseno_min_filter AND re.reseno <= $reseno_max_filter AND re.izobrazba >= $izobrazba_min_filter AND re.izobrazba <= $izobrazba_max_filter AND re.id = pr.resevalec";
$mysql_rezultatp = mysql_query($mysql_ukazz);
$odgovor_5 = mysql_fetch_row($mysql_rezultatp);				
#procenti
$vsi_skupaj = 	$odgovor_1[0] + $odgovor_2[0] + $odgovor_3[0] + $odgovor_4[0] + $odgovor_5[0];
#procent prvi
$odgovor_1_pro = round(($odgovor_1[0] * 100) / $vsi_skupaj,1);
$odgovor_1_fix = round($odgovor_1_pro)*2;	
$odgovor_2_pro = round(($odgovor_2[0] * 100) / $vsi_skupaj,1);
$odgovor_2_fix = round($odgovor_2_pro)*2;	
$odgovor_3_pro = round(($odgovor_3[0] * 100) / $vsi_skupaj,1);
$odgovor_3_fix = round($odgovor_3_pro)*2;	
$odgovor_4_pro = round(($odgovor_4[0] * 100) / $vsi_skupaj,1);
$odgovor_4_fix = round($odgovor_4_pro)*2;	
$odgovor_5_pro = round(($odgovor_5[0] * 100) / $vsi_skupaj,1);
$odgovor_5_fix = round($odgovor_5_pro)*2;	

#variante
$mysql_ukaz = "SELECT pv.varianta FROM pregovori_variante as pv, resevalci as re  WHERE pv.pregovor = $_GET[pregovor] AND re.spol LIKE '$spol_filter' AND re.odrascal LIKE '$odrascal_filter' AND re.zivi LIKE '$zivi_filter' AND re.rojen >= $rojen_min_filter AND re.rojen <= $rojen_max_filter AND re.reseno >= $reseno_min_filter AND re.reseno <= $reseno_max_filter AND re.izobrazba >= $izobrazba_min_filter AND re.izobrazba <= $izobrazba_max_filter AND  re.id = pv.uporabnik ORDER BY pv.cas DESC";
//echo $mysql_ukaz;
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
while ($resevalci_2234 = mysql_fetch_assoc($mysql_zapis)) {
	$tabela_vn = <<<SdgmPOwsD
	$tabela_vn
	<tr>
		<td style="vertical-align: top;">$resevalci_2234[varianta]</td>
	</tr>
SdgmPOwsD;
}						


#vn
echo <<<Asd_ff_mm56
<script name="js_5">
function okno(URL) {
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=600,height=400,left = 100,top = 100');");
}
</script>
<b>Podroben pregled enote</b><br><br>
Izbor: <select onchange="location.href = '?akcija=vpr_pos&pregovor='+this.value" name='preg'><option $sel_out value='NULL'>--izberi--</option>$pregovori_list</select>
<br>
<h2>$pregovor[0] (ID: $_GET[pregovor])</h2>
<table style="text-align: left; width: 650px;" border="0" cellpadding="2" cellspacing="2">
	<tbody>
		<tr>
			<td style="vertical-align: top;">1. poznam in uporabljam:</td>
			<td style="vertical-align: top;"><img src="1.png" border="0" onmouseover="Tip('$odgovor_1_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_1_fix\px" height="16"></td>	
			<td style="vertical-align: top;">$odgovor_1[0] | $odgovor_1_pro%</td>
		</tr>
		<tr>
			<td style="vertical-align: top;">2. poznam, a ne uporabljam:</td>
			<td style="vertical-align: top;"><img src="2.png" border="0" onmouseover="Tip('$odgovor_2_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_2_fix\px" height="16"></td>	
			<td style="vertical-align: top;">$odgovor_2[0] | $odgovor_2_pro%</td>
		</tr>
		<tr>
			<td style="vertical-align: top;">3. ne poznam, a razumem:</td>
			<td style="vertical-align: top;"><img src="3.png" border="0" onmouseover="Tip('$odgovor_3_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_3_fix\px" height="16"></td>
			<td style="vertical-align: top;">$odgovor_3[0] | $odgovor_3_pro%</td>
		</tr>
		<tr>
			<td style="vertical-align: top;">4. ne poznam in ne razumem:</td>
			<td style="vertical-align: top;"><img src="4.png" border="0" onmouseover="Tip('$odgovor_4_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_4_fix\px" height="16"></td>
			<td style="vertical-align: top;">$odgovor_4[0] | $odgovor_4_pro%</td>
		</tr>
		<tr>
			<td style="vertical-align: top;">5. poznam varianto:</td>
			<td style="vertical-align: top;"><img src="5.png" border="0" onmouseover="Tip('$odgovor_5_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_5_fix\px" height="16"></td>
			<td style="vertical-align: top;">$odgovor_5[0] | $odgovor_5_pro%</td>
		</tr>	
		<tr>
			<td style="vertical-align: top;">SUM:</td>
			<td style="vertical-align: top;"></td>
			<td style="vertical-align: top;">$vsi_skupaj | 100%</td>
		</tr>			
		<tr>
			<td colspan="3" rowspan="1" style="vertical-align: top;"><hr></td>
		</tr>	
		<tr>
			<td colspan="3" rowspan="1" style="vertical-align: top;"><a href="javascript:okno('filtri.php')"><img width='16' height='16' src='../uredi.png'></a> Filtri: <font color='#FF0000'>$txt_spol $txt_odrascal $txt_zivi $txt_rojen_min $txt_rojen_max $txt_reseno_min $txt_reseno_max $txt_izobrazba_min $txt_izobrazba_max</font></td>
		</tr>	
		<tr>
			<td colspan="3" rowspan="1" style="vertical-align: top;"><hr></td>
		</tr>													
	</tbody>
</table>
<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
	<tr>
		<td style="vertical-align: top;" align="center"><b>Variante</b></td>
	</tr>
	$tabela_vn
</tbody>
</table>
Asd_ff_mm56;
?>