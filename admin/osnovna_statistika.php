<?php
#dobi vse uporabnike
$mysql_ukaz = "SELECT COUNT(id) FROM resevalci";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
$resevalci = mysql_fetch_row($mysql_zapis);

#dobi vsa vprasanja
$mysql_ukaz = "SELECT COUNT(vrstni_red) FROM pregovori_resevalci";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
$vseh_vprasanj = mysql_fetch_row($mysql_zapis);

#dobi vsa resena vprasanja
$mysql_ukaz = "SELECT COUNT(vrstni_red) FROM pregovori_resevalci WHERE odgovor IS NOT NULL";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
$resenih_vprasanj = mysql_fetch_row($mysql_zapis);

#procent resenih vprasanj
$procent_resenih = round($resenih_vprasanj[0]/$vseh_vprasanj[0]*100);

#dobi vsa resena vprasanja
$mysql_ukaz = "SELECT resevalec FROM pregovori_resevalci GROUP BY resevalec";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
$vseh_vprasalnikov = 0;
$resenih_vprasalnikov = 0;
while ($resevalci_22 = mysql_fetch_assoc($mysql_zapis)) {
	$vseh_vprasalnikov = $vseh_vprasalnikov + 1;
	$mysql_ukaz = "SELECT COUNT(vrstni_red) FROM pregovori_resevalci WHERE resevalec = $resevalci_22[resevalec] AND odgovor IS NULL";
	$mysql_rezultatp = mysql_query($mysql_ukaz);
	$stevilo_manjkajocih = mysql_fetch_row($mysql_rezultatp);	
	if ($stevilo_manjkajocih[0] == 0) {
		$resenih_vprasalnikov = $resenih_vprasalnikov + 1;
	}
}

#procent resenih vprasalnikov
$procent_resenih_vprasalnikov = round($resenih_vprasalnikov/$vseh_vprasalnikov*100);

#baza
$db_vn = $_SESSION['db'];

#vn
echo <<<Asd_ff_mm56
<b>Osnovna statistika</b><br>
Uporabljena baza: <font color="#FF0000">$db_vn</font><br> 
Vseh reševalcev: <font color="#FF0000">$resevalci[0]</font><br>
Vseh dokončanih vprašalnikov: <font color="#FF0000">$resenih_vprasalnikov</font> od $vseh_vprasalnikov (<font color="#FF0000">$procent_resenih_vprasalnikov%</font>)<br>
Vseh dokončanih vprašanj: <font color="#FF0000">$resenih_vprasanj[0]</font> od $vseh_vprasanj[0] (<font color="#FF0000">$procent_resenih%</font>)<br>
Asd_ff_mm56;
?>