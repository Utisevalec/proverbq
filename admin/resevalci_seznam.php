<?php
#seznam resevalcev
$mysql_ukaz = "SELECT * FROM resevalci ORDER BY vnesen DESC, id DESC";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
while ($resevalci_22 = mysql_fetch_assoc($mysql_zapis)) {
	$mysql_ukazz = "SELECT COUNT(vrstni_red) FROM pregovori_resevalci WHERE resevalec = $resevalci_22[id] AND odgovor IS NULL";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$stevilo_manjkajocih = mysql_fetch_row($mysql_rezultatp);	
	$mysql_ukazz = "SELECT COUNT(vrstni_red) FROM pregovori_resevalci WHERE resevalec = $resevalci_22[id] AND odgovor IS NOT NULL";
	$mysql_rezultatp = mysql_query($mysql_ukazz);
	$stevilo_resenih = mysql_fetch_row($mysql_rezultatp);	
	#racunaj procente
	$vsi_odg = $stevilo_resenih[0] + $stevilo_manjkajocih[0];
	$procent_reseni = round($stevilo_resenih[0]/$vsi_odg*100,1);
	$procent_null = round($stevilo_manjkajocih[0]/$vsi_odg*100,1);
	$size_reseno = round($procent_reseni*0.99);
	$size_null = round($procent_null*0.99);
	#za vn	
	$tabela_vn = <<<SdgmPOwsD
	$tabela_vn
	<tr>
		<td style="vertical-align: top;">$resevalci_22[id]</td>
		<td style="vertical-align: top;">$resevalci_22[spol]</td>
		<td style="vertical-align: top;">$resevalci_22[rojen]</td>
		<td style="vertical-align: top;">$resevalci_22[izobrazba]</td>
		<td style="vertical-align: top;">$resevalci_22[odrascal]</td>
		<td style="vertical-align: top;">$resevalci_22[zivi]</td>
		<td style="vertical-align: top;">$resevalci_22[koda]</td>
		<td style="vertical-align: top;">$resevalci_22[vnesen]</td>
		<td style="vertical-align: top;">
			<img src="../zeleno.png" border="0" onmouseover="Tip('Rešeno že $procent_reseni% vprašalnika')" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$size_reseno%" height="16"><img src="../rdece.png" onmouseover="Tip('Preostalo še $procent_null% vprašalnika')" border="0" style="position: relative; top: 3px; left: 0px; z-index: 3; opacity: 0.6;" width="$size_null%" height="16">		
		</td>
	</tr>
SdgmPOwsD;
}

#vn
echo <<<Asd_ff_mm56
<b>Seznam reševalcev</b><br><br>
<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
	<tr>
		<td style="vertical-align: top;"><b>ID</b></td>
		<td style="vertical-align: top;"><b>spol</b></td>
		<td style="vertical-align: top;"><b>leto rojstva</b></td>
		<td style="vertical-align: top;"><b>izobrazba</b></td>
		<td style="vertical-align: top;"><b>odrasčal</b></td>
		<td style="vertical-align: top;"><b>ziveč</b></td>
		<td style="vertical-align: top;"><b>koda</b></td>
		<td style="vertical-align: top;"><b>registriran</b></td>
		<td style="vertical-align: top;"><b>status vprašalnika</b></td>
	</tr>
	$tabela_vn
</tbody>
</table>
Asd_ff_mm56;
?>