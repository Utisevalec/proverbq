<?php
#limit
if (!isset($_GET['limit'])) {
	$limit_in = "0 ,100";
	$_GET['limit'] = 0;
}
elseif ($_GET['limit'] == 'all') {
	$limit_in = '0, 1000';
}
else {
	$limit_in = "$_GET[limit], 100";
}

#sortitaj
$sortiraj = "pregovor ASC";
if (strlen($_GET['sortiraj']) > 3 AND strlen($_GET['updown']) > 2) {
	$sortiraj = $_GET['sortiraj'].' '.$_GET['updown'];
}

#seznam resevalcev
$mysql_ukaz = "SELECT id, pregovor, odg_125 FROM pregovori ORDER BY $sortiraj LIMIT $limit_in";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
while ($resevalci_223 = mysql_fetch_assoc($mysql_zapis)) {
	#odgovor 1
	$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $resevalci_223[id] AND pr.odgovor = 1 AND re.reseno = 100 AND re.id = pr.resevalec";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$odgovor_1 = mysql_fetch_row($mysql_rezultatp);	
	#odgovor 2
	$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $resevalci_223[id] AND pr.odgovor = 2 AND re.reseno = 100 AND re.id = pr.resevalec";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$odgovor_2 = mysql_fetch_row($mysql_rezultatp);	
	#odgovor 3
	$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $resevalci_223[id] AND pr.odgovor = 3 AND re.reseno = 100 AND re.id = pr.resevalec";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$odgovor_3 = mysql_fetch_row($mysql_rezultatp);	
	#odgovor 4
	$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $resevalci_223[id] AND pr.odgovor = 4 AND re.reseno = 100 AND re.id = pr.resevalec";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$odgovor_4 = mysql_fetch_row($mysql_rezultatp);	
	#odgovor 5
	$mysql_ukazz = "SELECT COUNT(pr.odgovor) FROM pregovori_resevalci as pr, resevalci as re WHERE pr.pregovor = $resevalci_223[id] AND pr.odgovor = 5 AND re.reseno = 100 AND re.id = pr.resevalec";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$odgovor_5 = mysql_fetch_row($mysql_rezultatp);				
	#procenti
	$vsi_skupaj = 	$odgovor_1[0] + $odgovor_2[0] + $odgovor_3[0] + $odgovor_4[0] + $odgovor_5[0];
	#procent prvi
	$odgovor_1_pro = round(($odgovor_1[0] * 100) / $vsi_skupaj,1);
	$odgovor_1_fix = round($odgovor_1_pro);	
	$odgovor_2_pro = round(($odgovor_2[0] * 100) / $vsi_skupaj,1);
	$odgovor_2_fix = round($odgovor_2_pro);	
	$odgovor_3_pro = round(($odgovor_3[0] * 100) / $vsi_skupaj,1);
	$odgovor_3_fix = round($odgovor_3_pro);	
	$odgovor_4_pro = round(($odgovor_4[0] * 100) / $vsi_skupaj,1);
	$odgovor_4_fix = round($odgovor_4_pro);	
	$odgovor_5_pro = round(($odgovor_5[0] * 100) / $vsi_skupaj,1);
	$odgovor_5_fix = round($odgovor_5_pro);		
	
	#
	#odg 125
	#			
	
	$resevalci_223[odg_125] = $odgovor_5_pro + $odgovor_1_pro + $odgovor_2_pro;	
	/*
	$mysql_ukazz = "SELECT COUNT(vrstni_red) FROM pregovori_resevalci WHERE resevalec = $resevalci_22[id] AND odgovor IS NOT NULL";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$stevilo_resenih = mysql_fetch_row($mysql_rezultatp);	
	#racunaj procente
	$vsi_odg = $stevilo_resenih[0] + $stevilo_manjkajocih[0];
	$procent_reseni = round($stevilo_resenih[0]/$vsi_odg*100,1);
	$procent_null = round($stevilo_manjkajocih[0]/$vsi_odg*100,1);
	$size_reseno = round($procent_reseni*0.99);
	$size_null = round($procent_null*0.99);
	*/
	#za vn	
	$tabela_vn = <<<SdgmPOwsD
	$tabela_vn
	<tr>
		<td style="vertical-align: top;">$resevalci_223[id]</td>
		<td style="vertical-align: top;"><a href="?akcija=vpr_pos&pregovor=$resevalci_223[id]">$resevalci_223[pregovor]</a></td>
		<td style="vertical-align: top;">$odgovor_1[0]</td>
		<td style="vertical-align: top;">$odgovor_2[0]</td>
		<td style="vertical-align: top;">$odgovor_3[0]</td>
		<td style="vertical-align: top;">$odgovor_4[0]</td>
		<td style="vertical-align: top;">$odgovor_5[0]</td>
		<td style="vertical-align: top;">$resevalci_223[odg_125]%</td>
		<td style="vertical-align: top; width: 105px;">
			<img src="1.png" border="0" onmouseover="Tip('$odgovor_1_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_1_fix\px" height="16"><img src="2.png" border="0" onmouseover="Tip('$odgovor_2_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_2_fix\px" height="16"><img src="3.png" border="0" onmouseover="Tip('$odgovor_3_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_3_fix\px" height="16"><img src="4.png" border="0" onmouseover="Tip('$odgovor_4_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_4_fix\px" height="16"><img src="5.png" border="0" onmouseover="Tip('$odgovor_5_pro% vseh odgovorov')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$odgovor_5_fix\px" height="16">	
		</td>
	</tr>
SdgmPOwsD;
}


#sort list
$sort_list = <<<SortByAll_123
<option value="">izberi</option>
<option value="sortiraj=pregovor&updown=ASC">abeceda-></option>
<option value="sortiraj=pregovor&updown=DESC">abeceda<-</option>
<option value="sortiraj=id&updown=ASC">ID-></option>
<option value="sortiraj=id&updown=DESC">ID<-</option>
<option value="sortiraj=odg_1&updown=ASC">odgovor 1-></option>
<option value="sortiraj=odg_1&updown=DESC">odgovor 1<-</option>
<option value="sortiraj=odg_2&updown=ASC">odgovor 2-></option>
<option value="sortiraj=odg_2&updown=DESC">odgovor 2<-</option>
<option value="sortiraj=odg_3&updown=ASC">odgovor 3-></option>
<option value="sortiraj=odg_3&updown=DESC">odgovor 3<-</option>
<option value="sortiraj=odg_4&updown=ASC">odgovor 4-></option>
<option value="sortiraj=odg_4&updown=DESC">odgovor 4<-</option>
<option value="sortiraj=odg_5&updown=ASC">odgovor 5-></option>
<option value="sortiraj=odg_5&updown=DESC">odgovor 5<-</option>
<option value="sortiraj=odg_125&updown=ASC">odgovor 1+2+5-></option>
<option value="sortiraj=odg_125&updown=DESC">odgovor 1+2+5<-</option>
SortByAll_123;

#sort list value
$sort_list_value = "sortiraj=$_GET[sortiraj]&updown=$_GET[updown]";

#vn
echo <<<Asd_ff_mm56
<script name="js_100">
//sortiraj
function sort_lst(url_vrednost) {
	location.href = 'index.php?akcija=vpr_sez_100&limit=$_GET[limit]&'+url_vrednost;
}

//set sort value
function set_sort() {
	element = document.getElementById('seznam_lst_1');
	element.value = '$sort_list_value';
	element2 = document.getElementById('seznam_lst_2');
	element2.value = '$sort_list_value';	
}

//timeout
setTimeout("set_sort()",500);
</script>
<b>Seznam enot z osnovno statistiko - rešenost 100%</b><br>
Stran: <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=0'>1</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=100'>2</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=200'>3</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=300'>4</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=400'>5</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=500'>6</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=600'>7</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=700'>8</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=800'>9</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=900'>10</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=all'>vse</a><br>Sortiraj: <select name="sort" id="seznam_lst_1" onchange="sort_lst(this.value)">$sort_list</select>
<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
	<tr>
		<td style="vertical-align: top;"><b>ID</b></td>
		<td style="vertical-align: top;"><b>enota</b></td>
		<td style="vertical-align: top;"><b>#1</b></td>
		<td style="vertical-align: top;"><b>#2</b></td>
		<td style="vertical-align: top;"><b>#3</b></td>
		<td style="vertical-align: top;"><b>#4</b></td>
		<td style="vertical-align: top;"><b>#5</b></td>
		<td style="vertical-align: top;"><b>%125</b></td>
		<td style="vertical-align: top; width: 105px;"><b>grafično</b></td>
	</tr>
	$tabela_vn
</tbody>
</table>
Stran: <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=0'>1</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=100'>2</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=200'>3</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=300'>4</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=400'>5</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=500'>6</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=600'>7</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=700'>8</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=800'>9</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=900'>10</a> | <a href='index.php?akcija=vpr_sez_100&sortiraj=$_GET[sortiraj]&updown=$_GET[updown]&limit=all'>vse</a><br>Sortiraj: <select name="sort" id="seznam_lst_2" onchange="sort_lst(this.value)">$sort_list</select>
Asd_ff_mm56;
?>