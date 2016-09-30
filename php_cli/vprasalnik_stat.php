#!/usr/bin/php -q
<?php
#neomejen čas izvajanja
set_time_limit(0);
ini_set("memory_limit","16M");

#na koliko časa
$cas_check = 60*10; //ena minuta * 5



#neskončna zanka
do {

	#prijavi na bazo
	$mysql_povezava = mysql_connect("localhost","root","") or die ("Ne morem se povezati na MySQL bazo!");
	mysql_select_db("meterc_vprasalnik"); mysql_query("SET CHARACTER SET UTF-8");

	#seznam resevalcev
	$mysql_ukaz = "SELECT id FROM resevalci WHERE reseno < 100 OR reseno IS NULL";
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
		//echo "ID: $resevalci_22[id]] Reseno: $procent_reseni\n";
		//zapisi
		$mysql_ukazz = "UPDATE resevalci SET reseno = $procent_reseni WHERE id = $resevalci_22[id]";
		$mysql_rezultatp = mysql_query($mysql_ukazz);		
	}
	
	#odgovori relativno
	$mysql_ukaz = "SELECT id FROM pregovori ORDER BY id ASC";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	while ($resevalci_223 = mysql_fetch_assoc($mysql_zapis)) {
		#odgovor 1
		$mysql_ukazz = "SELECT COUNT(odgovor) FROM pregovori_resevalci WHERE pregovor = $resevalci_223[id] AND odgovor = 1";
		$mysql_rezultatp = mysql_query($mysql_ukazz);
		$odgovor_1 = mysql_fetch_row($mysql_rezultatp);	
		#odgovor 2
		$mysql_ukazz = "SELECT COUNT(odgovor) FROM pregovori_resevalci WHERE pregovor = $resevalci_223[id] AND odgovor = 2";
		$mysql_rezultatp = mysql_query($mysql_ukazz);
		$odgovor_2 = mysql_fetch_row($mysql_rezultatp);	
		#odgovor 3
		$mysql_ukazz = "SELECT COUNT(odgovor) FROM pregovori_resevalci WHERE pregovor = $resevalci_223[id] AND odgovor = 3";
		$mysql_rezultatp = mysql_query($mysql_ukazz);
		$odgovor_3 = mysql_fetch_row($mysql_rezultatp);	
		#odgovor 4
		$mysql_ukazz = "SELECT COUNT(odgovor) FROM pregovori_resevalci WHERE pregovor = $resevalci_223[id] AND odgovor = 4";
		$mysql_rezultatp = mysql_query($mysql_ukazz);
		$odgovor_4 = mysql_fetch_row($mysql_rezultatp);	
		#odgovor 5
		$mysql_ukazz = "SELECT COUNT(odgovor) FROM pregovori_resevalci WHERE pregovor = $resevalci_223[id] AND odgovor = 5";
		$mysql_rezultatp = mysql_query($mysql_ukazz);
		$odgovor_5 = mysql_fetch_row($mysql_rezultatp);				
		#procenti
		$vsi_skupaj = 	$odgovor_1[0] + $odgovor_2[0] + $odgovor_3[0] + $odgovor_4[0] + $odgovor_5[0];
		#procent prvi, drugi, tertji ...
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
		#procent poznano (1+2+5)
		$odgovor_poz_pro = $odgovor_5_pro + $odgovor_1_pro + $odgovor_2_pro;
		#updejt
		$mysql_ukazz = "UPDATE pregovori SET odg_1 = $odgovor_1_pro, odg_2 = $odgovor_2_pro, odg_3 = $odgovor_3_pro, odg_4 = $odgovor_4_pro, odg_5 = $odgovor_5_pro, odg_125 = $odgovor_poz_pro WHERE id = $resevalci_223[id] LIMIT 1";
		$mysql_rezultatp = mysql_query($mysql_ukazz);			
	}	
	
	#optimiraj
	$mysql_ukazz = "OPTIMIZE TABLE resevalci";
	$mysql_rezultatp = mysql_query($mysql_ukazz);		
	$mysql_ukazz = "OPTIMIZE TABLE pregovori";
	$mysql_rezultatp = mysql_query($mysql_ukazz);

	#zapri bazo
	mysql_close($mysql_povezava);
	
	echo ".";

	#wait
	sleep($cas_check);

} while (true);

?>