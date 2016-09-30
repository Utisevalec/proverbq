<?php
//if odgovor je 0N
if ($_GET['odgovor'] == "0N" AND $_GET['preg'] > 0 AND $_GET['vrednost'] > 0) {
	#shrani
	$mysql_ukaz = "UPDATE pregovori_resevalci SET odgovor = $_GET[vrednost], cas = NOW() WHERE pregovor = $_GET[preg] AND resevalec = $_SESSION[id_user]";
	$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);	
	#ce je odgovor 5 in je txt daljsi od 5 nzakov shrani se varianto
	if ($_GET['vrednost'] == 5 AND strlen($_GET['vari']) > 5) {
		$_GET['vari'] = addslashes($_GET['vari']);
		#shrani
		$mysql_ukaz = "INSERT INTO pregovori_variante(uporabnik,pregovor,varianta,cas) VALUES($_SESSION[id_user],$_GET[preg],'$_GET[vari]',NOW())";
		$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);			
	}
}


//main part vprasalnika
$mysql_ukaz = "SELECT p.pregovor, p.id FROM pregovori as p, pregovori_resevalci as pr WHERE pr.resevalec = $_SESSION[id_user] AND pr.odgovor IS NULL AND pr.pregovor = p.id ORDER BY pr.vrstni_red LIMIT 1";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
$vrstica = mysql_fetch_row($mysql_zapis);

#ce je
if (isset($vrstica[1])) {

#barva ozadja
if (!isset($_SESSION['div_color'])) { //ce ni settana je rdeca
	$_SESSION['div_color'] = 0;
}

#barva je settana - stej
$_SESSION['div_color'] = $_SESSION['div_color'] + 1;
if ($_SESSION['div_color'] > 4) {
	$_SESSION['div_color'] = 1;
}


//out
echo <<<AsasttZu89
<script name="js_2">
function check_input(tekst) {
	dolzina = tekst.length;
	if (dolzina > 5) {
		//vse ok
		location.href = 'index.php?akcija=none&odgovor=0N&vrednost=5&preg=$vrstica[1]&vari='+tekst;
	}
	else {
		//napaka dolzine
		alert('V polje varianta vpišite več kot 5 znakov dolg odgovor!');
	}
}

setTimeout("r_o()",300);

function r_o() {
	document.getElementById('varianta_id').setAttribute('readonly',1);
}
</script>
<form name="vprasalnik_form">
<font class="pisava_normal">
<div align="center" style="width: 100%;">
	<div id="vprasanje_div" class="div_vprasanje_$_SESSION[div_color]">
	<br><font class="pisava_naslov">$vrstica[0]</font><br><br>
<div align="center">
<table style="text-align: left;" border="0" cellpadding="2" cellspacing="2">
	<tbody>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').setAttribute('readonly',1);document.getElementById('varianta_id').value = ''; location.href = 'index.php?akcija=none&odgovor=0N&vrednost=1&preg=$vrstica[1]';" class="obrazec_radio" type="radio" name="odgovor" value="1">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="index.php?akcija=none&odgovor=0N&vrednost=1&preg=$vrstica[1]" class="pisava_normal">poznam in uporabljam</font>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').setAttribute('readonly',1);document.getElementById('varianta_id').value = ''; location.href = 'index.php?akcija=none&odgovor=0N&vrednost=2&preg=$vrstica[1]';" class="obrazec_radio" type="radio" name="odgovor" value="2">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="index.php?akcija=none&odgovor=0N&vrednost=2&preg=$vrstica[1]" class="pisava_normal">poznam, a ne uporabljam</a>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').setAttribute('readonly',1);document.getElementById('varianta_id').value = ''; location.href = 'index.php?akcija=none&odgovor=0N&vrednost=3&preg=$vrstica[1]';" class="obrazec_radio" type="radio" name="odgovor" value="3">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="index.php?akcija=none&odgovor=0N&vrednost=3&preg=$vrstica[1]" class="pisava_normal">ne poznam, a razumem</a>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').setAttribute('readonly',1);document.getElementById('varianta_id').value = ''; location.href = 'index.php?akcija=none&odgovor=0N&vrednost=4&preg=$vrstica[1]';" class="obrazec_radio" type="radio" name="odgovor" value="4">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="index.php?akcija=none&odgovor=0N&vrednost=4&preg=$vrstica[1]" class="pisava_normal">ne poznam in ne razumem</a>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%"><input onclick="document.getElementById('varianta_id').removeAttribute('readonly',1); document.vprasalnik_form.varianta.focus();" class="obrazec_radio" type="radio" id="odgovor_id_5" name="odgovor" value="5">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><a href="#" onclick="document.getElementById('varianta_id').removeAttribute('readonly',1); document.vprasalnik_form.varianta.focus();getElementById('odgovor_id_5').checked = true;" class="pisava_normal">varianta:</a> <input type="text" id="varianta_id" onClick="getElementById('odgovor_id_5').checked = true;document.getElementById('varianta_id').removeAttribute('readonly',1);" name="varianta" value="" size="18" class="obrazec_normal"> <input type="button" name="t5" onclick="check_input(document.vprasalnik_form.varianta.value)" value="OK" class="obrazec_normal">
		</td>
	</tr>
	<tr>
		<td style="vertical-align: middle;" align="right" width="14%">
		</td>
		<td style="vertical-align: middle;" width="1%">
		</td>
		<td style="vertical-align: middle;" width="85%"><font class="pisava_mala">Ko kliknete na ustrezen odgovor, se vam bo avtomatično naložilo novo vprašanje. Če izberete "varianto" vpišite besedilo v polje in kliknite na gumb "ok" za potrditev!</font>
		</td>
	</tr>				
	</tbody>
</table>
</div>
<br>
	</div>
</div>
</font>
</form>
AsasttZu89;

}
else {
	echo <<<Asdfrrrwe33
<font class="pisava_normal">
Nalaga se zadnji del vprašalnika, prosimo počakajte trenutek.
<script name="js1">
setTimeout("odjava()",3500);
function odjava() {
	location.href = 'index.php?akcija=vnos_extra';
}
</script>
</font>
Asdfrrrwe33;
}
?>