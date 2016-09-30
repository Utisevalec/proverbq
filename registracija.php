<?php
#registracija

#shrani v bazo
if ($_POST['vnos'] == '0K' AND strtolower($_POST['koda_bot']) == "alfa1125") {
	#hash datuma in koda
	$koda_out = sha1(date('Ymdhis'));
	$koda_out = strtoupper(substr($koda_out,2,6));
	#drugo - sestavi
	if ($_POST['odrascal'] == 'drugo') {
		$_POST['odrascal'] = 'drugo: '.$_POST['odrascal_extra'];	
	}
	if ($_POST['zivi'] == 'drugo') {
		$_POST['zivi'] = 'drugo: '.$_POST['zivi_extra'];	
	}	
	#zapis
	$mysql_ukaz = "INSERT INTO resevalci(id,spol,rojen,odrascal,zivi,izobrazba,koda,vnesen,ip) VALUES('','$_POST[spol]','$_POST[rojen]','$_POST[odrascal]','$_POST[zivi]','$_POST[izobrazba]','$koda_out',NOW(),'$_SERVER[REMOTE_ADDR]')";	
	$mysql_zapis = mysql_query($mysql_ukaz);	
	$_SESSION['id_user'] = mysql_insert_id();
	$_SESSION['koda_user'] = $koda_out;
	if ($_SESSION['id_user'] > 0) { //da ni nic
	#naredi seznam vprasanj - random
	$mysql_ukaz = "SELECT id FROM pregovori ORDER BY RAND()";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$stej = 0;
	while ($vrstica = mysql_fetch_assoc($mysql_zapis)) {
		$stej = $stej + 1;
		$mysql_ukazz = "INSERT INTO pregovori_resevalci(resevalec,pregovor,vrstni_red) VALUES('$_SESSION[id_user]','$vrstica[id]','$stej')";	
		$mysql_zapiss = mysql_query($mysql_ukazz);			
	}	
	echo <<<AfuemBv
<font class="pisava_normal">
<script name="js_5">
function okno(URL) {
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=600,height=200,left = 280,top = 220');");
}
</script>
Hvala za vaše podatke!
<br>
Vprašalnik je dolg, zato ga je mogoče reševati v več delih. 
Za dostop do vašega vprašalnika potrebujete 6-mestno kodo, ki je izpisana na dnu te strani. 
To kodo si shranite in je ne izgubite! Če želite se vam lahko pošlje tudi na e-mail naslov.
<br><br><br>
<b>Vaša koda:</b> 
<span id="1231" style="border: 2px solid #FF0000; margin: 5px; padding: 5px; background-color: #FFFFFF;"><font color="#000000">$koda_out</font></span> <a class="pisava_mala" href="javascript:okno('mail.php?koda=$koda_out')"><img onmouseover="Tip('Kliknite tu, če želite prejeti kodo na vaš e-mail naslov!')" style="position: relative; top: 10px; left: 0px; z-index: 3;" src="email.png" border="0" width="32" height="32"></a>
<br><br><br>
Ko boste prepisali oz. kako drugače shranili kodo na varno, lahko nadaljujte z <input type="submit" class="obrazec_normal" onclick="location.href = '?akcija=none'" name="prijava" value="reševanjem vprašalnika">
</font>
AfuemBv;
}
else {
	unset($_SESSION['id_user']);
	unset($_SESSION['koda_user']);	
	header('location: http://vprasalnik.tisina.net/?akcija=nov');
}
}
else {
#naredi seznam let rojstva
foreach (range(2008,1900) as $leto_vn) {
	$leto_rojstva_seznam = $leto_rojstva_seznam."<option value='$leto_vn'>$leto_vn</option>";
}

#narecna obmocja
$narecna_obmocja_odrascal = <<<Asdfsafqa
     <option value='gorenjska'>Gorenjska narečna skupina</option>
     <option value='dolenjska'>Dolenjska narečna skupina z belokranjskimi narečji</option>      
     <option value='stajerska'>Štajerska narečna skupina</option>      
     <option value='panonska'>Panonska narečna skupina</option>      
     <option value='koroska'>Koroška narečna skupina</option>      
     <option value='primorska'>Primorska narečna skupina</option>      
     <option  value='rovtarska'>Rovtarska narečna skupina</option>
Asdfsafqa;
$narecna_obmocja_zivi = <<<Asdfsafqa
     <option value='gorenjska'>Gorenjska narečna skupina</option>
     <option value='dolenjska'>Dolenjska narečna skupina z belokranjskimi narečji</option>      
     <option  value='stajerska'>Štajerska narečna skupina</option>      
     <option value='panonska'>Panonska narečna skupina</option>      
     <option  value='koroska'>Koroška narečna skupina</option>      
     <option value='primorska'>Primorska narečna skupina</option>      
     <option value='rovtarska'>Rovtarska narečna skupina</option>
Asdfsafqa;
$izobrazba = <<<Asdfsafqa
<option value="1">1. stopnja</option>
<option value="2">2. stopnja</option>
<option value="3">3. stopnja</option>
<option value="4">4. stopnja</option>
<option value="5">5. stopnja</option>
<option value="6">6. stopnja</option>
<option value="7">7. stopnja</option>
<option value="8">8. stopnja</option>
Asdfsafqa;

#vn
echo <<<AsfdavcmPsad
<form name="prijava" action="index.php?akcija=nov" method="POST">
<input type="hidden" name="vnos" value="0K">
<script name="js_3">
//funkcija prikaza
function razsiri(ime_spana) {
if (document.getElementById(ime_spana)) {
var stanje = document.getElementById(ime_spana).style.display;
if (stanje == "none") { //ce je skrit ga prikazi
document.getElementById(ime_spana).style.display = 'block';
}
else { //ce je prikazan ga skrij
document.getElementById(ime_spana).style.display = 'none';
}
}
}

//funkcija zivi
function dodatna(vrednost,ime_spana) {
	if (vrednost == 'drugo') {
		document.getElementById(ime_spana).style.display = 'block';
	}
	else {
		document.getElementById(ime_spana).style.display = 'none';	
	}
}
</script>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
<tbody>
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		<font class="pisava_normal"><b>Izpolnite:</b></font>
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>		
		<td style="vertical-align: middle; width: 73%;">
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		<font class="pisava_normal">Spol</font>
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		<select class="obrazec_normal" name='spol'><option value='m'>moški</option><option value='ž'>ženska</option></select>
		</td>
	</tr>	
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		<font class="pisava_normal">Rojen (leto rojstva)</font>
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		<select class="obrazec_normal" name='rojen'>$leto_rojstva_seznam</select>
		</td>
	</tr>	
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		<font class="pisava_normal">Stopnja izobrazbe</font>
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		<select class="obrazec_normal" name='izobrazba'>
			$izobrazba
		</select> 
		<a href="javascript:razsiri('stopnje_izobrazbe')"><img onmouseover="Tip('Prikaži opisni seznam stopenj izbrazbe')" src="pomoc.png" width="24" height="24" border="0" style="position: relative; top: 2px; left: 5px; z-index: 3;"></a>
		</td>
	</tr>	
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		<font class="pisava_mala">
		<div style="display: none;" id="stopnje_izobrazbe">
1. stopnja: 7 razredov osnovne šole ali manj<br>
2. stopnja: dokončana osnovna šola<br>
3. stopnja: dokončana poklicna šola<br>
4. stopnja: dokončana srednja strokovna šola<br>
5. stopnja: dokončana gimnazija in ostale štiriletne šole<br>
6. stopnja: sedanja bolonjska 1. stopnja univ. ali visokošolskega
strokovnega programa, po starem sistemu višješolski programi (do 1994)
in višješolski strokovni programi ter specializacija po višješolskih
programih in visokošolski strokovni programi<br>
7. stopnja: sedanja 2. bolonjska stopnja (magisterij stroke), po
starem sistemu diploma univ. programa ali specializacija po
visokošolskih strokovnih programih<br>
8. stopnja: doktorat znanosti (po starem in po bolonjskem sistemu),
magisterij znanosti po starem sistemu				
		</div>
		</font>
		</td>
	</tr>			
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		<font class="pisava_normal">Odraščal (narečno območje)</font>
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		<select onchange="dodatna(this.value,'odrascal_extra_id')" class="obrazec_normal" name='odrascal'>
			$narecna_obmocja_odrascal
			<option value='drugo'>drugo - dopišite</option>
		</select>
		<input type="text" style="display: none;" name="odrascal_extra" id="odrascal_extra_id" size="16" class="obrazec_normal">
		</td>
	</tr>		
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		<font class="pisava_normal">Trenutno prebivališče (narečno območje)</font>
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		<select onchange="dodatna(this.value,'zivi_extra_id')"  class="obrazec_normal" name='zivi'>
			$narecna_obmocja_zivi
			<option value='drugo'>drugo - dopišite</option>
		</select>
		<input type="text" style="display: none;" name="zivi_extra" id="zivi_extra_id" size="16" class="obrazec_normal">
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		<font class="pisava_normal">Prepišite tekst iz slike v okence</font>
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		 <img border="0" width="200" height="60" src="webbot_sux.png"><br><input type="text" name="koda_bot" id="koda_bot_id" size="12" class="obrazec_normal">
		</td>
	</tr>	
	<tr>
		<td style="vertical-align: middle; width: 25%;" align="right">
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		<font class="pisava_normal"><b>Prosimo, da vprašalnik rešuje naenkrat le ena oseba po lastni
jezikovni presoji, brez pomoči slovarjev in drugih virov.</b></font>
		</td>
	</tr>			
	<tr>
		<td style="vertical-align: middle; width: 25%;">
		</td>
		<td style="vertical-align: middle; width: 2%;" align="right">
		</td>				
		<td style="vertical-align: middle; width: 73%;">
		<input type="submit" class="obrazec_normal" name="prijava" value="naprej">
		</td>
	</tr>		
</tbody>
</table>
</form>
AsfdavcmPsad;
}
?>