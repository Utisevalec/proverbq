<?php
#ce je vnos - shrani in poslji mail
if ($_POST['poslji'] == '0K') {
	#slash
	$_POST['vnos_1'] = addslashes($_POST['vnos_1']);
	$_POST['vnos_2'] = addslashes($_POST['vnos_2']);
	$_POST['vnos_3'] = addslashes($_POST['vnos_3']);
	$_POST['vnos_4'] = addslashes($_POST['vnos_4']);
	$_POST['vnos_5'] = addslashes($_POST['vnos_5']);
	$_POST['vnos_6'] = addslashes($_POST['vnos_6']);					
	#shrani
	if (strlen($_POST['vnos_1']) > 5) {
		$mysql_ukaz = "INSERT INTO vnos_extra(resevalec,tip,vnos,cas) VALUES($_SESSION[id_user],1,'$_POST[vnos_1]',NOW()) ON DUPLICATE KEY UPDATE vnos = '$_POST[vnos_1]', cas = NOW()";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);	
	}
	elseif ($_POST['vnos_1'] <= 5) {
		$mysql_ukaz = "DELETE FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 1 LIMIT 1";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	}		
	if (strlen($_POST['vnos_2']) > 5) {
		$mysql_ukaz = "INSERT INTO vnos_extra(resevalec,tip,vnos,cas) VALUES($_SESSION[id_user],2,'$_POST[vnos_2]',NOW()) ON DUPLICATE KEY UPDATE vnos = '$_POST[vnos_2]', cas = NOW()";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);	
	}	
	elseif ($_POST['vnos_2'] <= 5) {
		$mysql_ukaz = "DELETE FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 2 LIMIT 1";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	}		
	if (strlen($_POST['vnos_3']) > 5) {
		$mysql_ukaz = "INSERT INTO vnos_extra(resevalec,tip,vnos,cas) VALUES($_SESSION[id_user],3,'$_POST[vnos_3]',NOW())  ON DUPLICATE KEY UPDATE vnos = '$_POST[vnos_3]', cas = NOW()";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);	
	}	
	elseif ($_POST['vnos_3'] <= 5) {
		$mysql_ukaz = "DELETE FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 3 LIMIT 1";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	}		
	if (strlen($_POST['vnos_4']) > 5) {
		$mysql_ukaz = "INSERT INTO vnos_extra(resevalec,tip,vnos,cas) VALUES($_SESSION[id_user],4,'$_POST[vnos_4]',NOW()) ON DUPLICATE KEY UPDATE vnos = '$_POST[vnos_4]', cas = NOW()";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);	
	}	
	elseif ($_POST['vnos_4'] <= 5) {
		$mysql_ukaz = "DELETE FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 4 LIMIT 1";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	}		
	if (strlen($_POST['vnos_5']) > 5) {
		$mysql_ukaz = "INSERT INTO vnos_extra(resevalec,tip,vnos,cas) VALUES($_SESSION[id_user],5,'$_POST[vnos_5]',NOW()) ON DUPLICATE KEY UPDATE vnos = '$_POST[vnos_5]', cas = NOW()";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);	
	}	
	elseif ($_POST['vnos_5'] <= 5) {
		$mysql_ukaz = "DELETE FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 5 LIMIT 1";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	}		
	if (strlen($_POST['vnos_6']) > 5) {
		$mysql_ukaz = "INSERT INTO vnos_extra(resevalec,tip,vnos,cas) VALUES($_SESSION[id_user],6,'$_POST[vnos_6]',NOW()) ON DUPLICATE KEY UPDATE vnos = '$_POST[vnos_6]', cas = NOW()";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);	
	}		
	elseif ($_POST['vnos_6'] <= 5) {
		$mysql_ukaz = "DELETE FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 6 LIMIT 1";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	}							
	#izpis final
	echo <<<SADsfdsfBBnzzu89
	<font class="pisava_normal"><b>Hvala!</b><br><br>
Zahvaljujemo se vam za reševanje vprašalnika in dodatna mnenja ter pripombe!
<br><br>
<font class="pisava_mala">
Avtor Matej Meterc (Filozofska fakulteta, Ljubljana) z mentorjema Jozefom Pallayem (Filozofska fakulteta, Ljubljana) in Petrom Ďurčem (Filozofska fakulteta, Trnava)	<br><br>
</font>	
</font>
<input class="obrazec_normal" onclick="location.href = '?akcija=odjava'" type="button" name="t8" value="odjavi me">
SADsfdsfBBnzzu89;
}
#prikaz formo
else {
	#dobi seznam
	$mysql_ukaz = "SELECT vnos FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 1 LIMIT 1";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$vrstica_tip_1 = mysql_fetch_row($mysql_zapis);	
	$mysql_ukaz = "SELECT vnos FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 2 LIMIT 1";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$vrstica_tip_2 = mysql_fetch_row($mysql_zapis);		
	$mysql_ukaz = "SELECT vnos FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 3 LIMIT 1";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$vrstica_tip_3 = mysql_fetch_row($mysql_zapis);		
	$mysql_ukaz = "SELECT vnos FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 4 LIMIT 1";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$vrstica_tip_4 = mysql_fetch_row($mysql_zapis);		
	$mysql_ukaz = "SELECT vnos FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 5 LIMIT 1";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$vrstica_tip_5 = mysql_fetch_row($mysql_zapis);		
	$mysql_ukaz = "SELECT vnos FROM vnos_extra WHERE resevalec = $_SESSION[id_user] AND tip = 6 LIMIT 1";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
	$vrstica_tip_6 = mysql_fetch_row($mysql_zapis);						
	#vn
	echo <<<Asdfrrrwe33
<font class="pisava_normal">	
Zahvaljujemo se vam za reševanje jedra vprašalnika.<br><br>
<b>Zaključni obrazec z nekaj dodatnimi vprašanji</b>
<br>
V zaključnem obrazcu je pripravljenih še nekaj vprašanj. Obrazec je vprašalniku dodan tudi zato, ker nabor pregovornih enot kaže le slovarski približek dejanskemu stanju v slovenščini. Zato imate možnost, da dodate še kaj, za kar menite, da se ne bi smelo spregledati. Prosimo vas, da navajate enote, ki se jih spomnite sami in si ne pomagate z zbirkami ali brskanjem po spletu. Zaželjeno je vsako vaše mnenje, kritična ocena ali kreativna pobuda, vsaka dodatna pregovorna enota, ki jo navedete, pa je še posebej dragocena. V odgovorih se prepustite svoji intuiciji, osebnim izkušnjam in opažanjem. Obrazec seveda lahko oddate tudi brez nekaterih odgovorov na ta dodatna vprašanja, če tako želite. <br><br>
</font>
<form name="obrazec_extra" method="POST" action="index.php?akcija=vnos_extra">
<input type="hidden" name="poslji" value="0K">
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
<tbody>

<tr>
	<td style="vertical-align: top;" align="left"><font class="pisava_normal"><b>1. Se spomnite kakšnega pregovora, ki ga v vprašalniku niste zasledili?
Navedite toliko enot, kolikor želite.</b></font>
	</td>
</tr>
<tr>
	<td style="vertical-align: top;">
	<textarea rows="5" name="vnos_1" class="obrazec_normal" style="width: 95%;" cols="50">$vrstica_tip_1[0]</textarea>
	</td>
</tr>

<tr>
	<td style="vertical-align: top;" align="left"><font class="pisava_normal"><b><br>2. Uporabljate tudi kakšne pregovore iz drugih jezikov, ko komunicirate v slovenščini (npr. iz angleščine, hrvaščine, srbščine, latinščine,…)? 
Naštejte tiste, ki jih po vašem mnenju najpogosteje uporabljate (največ pet).</b></font>
	</td>
</tr>
<tr>
	<td style="vertical-align: top;">
	<textarea rows="5" name="vnos_2" class="obrazec_normal" style="width: 95%;" cols="50">$vrstica_tip_2[0]</textarea> 
	</td>
</tr>

<tr>
	<td style="vertical-align: top;" align="left"><font class="pisava_normal"><b><br>3. Napišite nekaj pregovorov, ki so vam najljubši (največ pet). 
Če želite, utemeljite.</b></font>
	</td>
</tr>
<tr>
	<td style="vertical-align: top;">
	<textarea rows="5" name="vnos_3" class="obrazec_normal" style="width: 95%;" cols="50">$vrstica_tip_3[0]</textarea> 
	</td>
</tr>

<tr>
	<td style="vertical-align: top;" align="left"><font class="pisava_normal"><b><br>4. Se spomnite kakšnega pregovora, ki vam ni všeč ali do njega čutite odpor (največ 5)? 
Če želite, utemeljite.</b></font>
	</td>
</tr>
<tr>
	<td style="vertical-align: top;">
	<textarea rows="5" name="vnos_4" class="obrazec_normal" style="width: 95%;" cols="50">$vrstica_tip_4[0]</textarea> 
	</td>
</tr>

<tr>
	<td style="vertical-align: top;" align="left"><font class="pisava_normal"><b><br>5. Poznate kakšen humorno preoblikovan pregovor, šalo ali pa besedno igro, ki je izšla iz pregovora?</b></font>
	</td>
</tr>
<tr>
	<td style="vertical-align: top;">
	<textarea rows="5" name="vnos_5" class="obrazec_normal" style="width: 95%;" cols="50">$vrstica_tip_5[0]</textarea> 
	</td>
</tr>

<tr>
	<td style="vertical-align: top;" align="left"><font class="pisava_normal"><b><br>6. Imate kakšno pripombo glede vprašalnika ali pregovornih enot v njem?</b></font>
	</td>
</tr>
<tr>
	<td style="vertical-align: top;">
	<textarea rows="5" name="vnos_6" class="obrazec_normal" style="width: 95%;" cols="50">$vrstica_tip_6[0]</textarea> 
	</td>
</tr>

<tr>
	<td style="vertical-align: top;">
	<input class="obrazec_normal" type="submit" style="width: 95%; height: 50px" name="t6" value="pošlji napisano in zaključi reševanje">
	</td>
</tr>
</tbody>
</table>
</form>
Asdfrrrwe33;
}
?>