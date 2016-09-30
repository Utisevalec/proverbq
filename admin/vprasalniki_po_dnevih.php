<?php
#dobi stevilo vseh
$mysql_ukaz = "SELECT COUNT(id) FROM pregovori";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
$podatek_pregovor_vsi = mysql_fetch_row($mysql_zapis);  

#preberi podatke za graf (zanka dnevov)
$end_loop = 0;
$stej = 60;
$sirina_grafa_px = 10;
$sirina_grafa = ($stej * $sirina_grafa_px) + 10;
while ($stej >= 0) {
	 #dobi datum enega dne
    $check_date = date ("Y-m-d", strtotime("-$stej day", strtotime(date('Y-m-d'))));
    #preveri PRVI vnos s tega datuma
	 $mysql_ukaz = "SELECT COUNT(pregovor) FROM pregovori_resevalci WHERE cas >= '$check_date 00:00:00' AND cas <= '$check_date 23:59:59' AND vrstni_red = $podatek_pregovor_vsi[0]";
	 $mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	 $podatek_stanje_zacetek = mysql_fetch_row($mysql_zapis);   
	 $visina_grafa = round(($podatek_stanje_zacetek[0]*5))+1;
	 $graf_vn = $graf_vn."<img title='Datum: $check_date, Rešenih: $podatek_stanje_zacetek[0]' src='pika.png' width='$sirina_grafa_px' height='$visina_grafa' border='0'>";  
    $tabela_vn = "<br>Datum: $check_date => $podatek_stanje_zacetek[0]".$tabela_vn;
    $stej = $stej - 1;
    #koncaj loop
    if ($stej <= 0) {
		$end_loop = 1;    
    }
} 

#vn
echo <<<Asd_ff_mm56
<b>Rešeni vprašalniki po dnevih</b><br><br>
<img src='pika.png' width="$sirina_grafa" height='1'><br><img src='pika.png' width='1' height='300'>$graf_vn<img src='pika.png' width='1' height='300'>
<br>$tabela_vn
Asd_ff_mm56;
?>