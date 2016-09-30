<?php
//seznam

//dobi seznam
$mysql_ukaz = "SELECT p.pregovor, p.id, pr.odgovor FROM pregovori as p, pregovori_resevalci as pr WHERE pr.resevalec = $_SESSION[id_user] AND pr.pregovor = p.id ORDER BY pr.vrstni_red";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);

//sifrant odgovorov
$odgovori_array = array(NULL => 'neodgovorjeno',1 => 'poznam in uporabljam', 2 => 'poznam, a ne uporabljam', 3 => 'ne poznam, a razumem', 4 => 'ne poznam in ne razumem', 5 => 'varianta');

//zadnji
$mysql_ukazd = "SELECT p.id FROM pregovori as p, pregovori_resevalci as pr WHERE pr.resevalec = $_SESSION[id_user] AND pr.odgovor IS NULL AND pr.pregovor = p.id ORDER BY pr.vrstni_red LIMIT 1";
$mysql_zapisd = mysql_query($mysql_ukazd,$mysql_povezava);
$vrstica_id = mysql_fetch_row($mysql_zapisd);

//vrstice
while ($vrstica = mysql_fetch_assoc($mysql_zapis)) {
	#test
	$odgovor_out = $odgovori_array[$vrstica['odgovor']];
	#ce je settan
	$edit_out = "";
	if (isset($vrstica['odgovor'])) {
		$edit_out =	"<a href='javascript:okno(\"popravek.php?preg=$vrstica[id]\")'><img width='24' onmouseover='Tip(\"Kliknite za spremembo oz. popravek odgovora!\")' height='24' border='0' src='uredi.png' style='position: relative; top: 3px; left: 0px; z-index: 3;'></a>";
	}
	#slink na zadnjega
	$link_on = '';
	if ($vrstica_id[0] == $vrstica['id']) {
		$link_on = "<a name='zadnji' style='position: relative; top: -400px; left: 0px; z-index: 3;'></a>";
	}
	#ce je varianta dodaj se info
	$var_inf = '';	
	if ($vrstica['odgovor'] == 5) {
		$mysql_ukazd = "SELECT varianta FROM pregovori_variante WHERE uporabnik = $_SESSION[id_user] AND pregovor = $vrstica[id] LIMIT 1";
		$mysql_zapisd = mysql_query($mysql_ukazd,$mysql_povezava);
		$vrstica_tekst = mysql_fetch_row($mysql_zapisd);		
		$var_inf = "<a href='javascript:void();'><img width='24' onmouseover='Tip(\"$vrstica_tekst[0]\")' height='24' border='0' src='tekst.png' style='position: relative; top: 3px; left: 0px; z-index: 3;'></a>";
	}
	#za vn
	$vprasalnik_seznam = <<<VpraSalnikVn33
	$vprasalnik_seznam	
<tr class="tabela_seznam" onMouseOver="this.bgColor='#C8C8C8';" onMouseOut="this.bgColor='#D4D0C7';">
	<td width="65%" class="tabela_seznam"  style="vertical-align: top;">
		<font class="pisava_normal">$link_on$vrstica[pregovor]</font>
	</td>
	<td width="35%" class="tabela_seznam" style="vertical-align: top;">
		<font class="pisava_normal">$odgovor_out$var_inf $edit_out</font>
	</td>
</tr>	
VpraSalnikVn33;
}

echo <<<AdsdsatTweq
<script type="text/javascript" src="floating.js"> </script>  
<script name="js_5">
function okno(URL) {
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=480,left = 100,top = 100');");
}

    floatingMenu.add('floatdiv',  
        {  
            // Represents distance from left or right browser window  
            // border depending upon property used. Only one should be  
            // specified.  
            // targetLeft: 0,  
            targetRight: 5,  
  
            // Represents distance from top or bottom browser window  
            // border depending upon property used. Only one should be  
            // specified.  
            targetTop: 250,  
          	//targetBottom: 0,  
  
            // Uncomment one of those if you need centering on  
            // X- or Y- axis.  
            // centerX: true,  
            // centerY: true,  
  
            // Remove this one if you don't want snap effect  
            snap: true  
        }); 
</script>
<div id="floatdiv" style="position:absolute; width:170px;height:90px;top:10px;right:10px; padding:16px;background:#FFFFFF; border:2px solid #8C8C8C; opacity: 0.85; z-index:100">  
	<font class='pisava_mala'>
	Skok na:<br>
	- <a class='pisava_mala' href='?akcija=seznam#zacetek'>začetek seznama</a><br>
	- <a class='pisava_mala' href='?akcija=seznam#zadnji'>zadnjo rešeno enoto</a><br>
	- <a class='pisava_mala' href='?akcija=seznam#konec'>konec seznama</a><br>
		- <a class='pisava_mala' href='?'>naslednje vprašanje</a>
	</font>
</div>  
<a name='zacetek'></a>
<table style="text-align: left; width: 100%;" class="tabela_seznam" cellpadding="2" cellspacing="2">
<tbody>
<tr class="tabela_seznam" style="background-color: #C0C0C0;">
	<td width="65%" class="tabela_seznam" style="vertical-align: top;"><font class="pisava_normal"><b>Enota</b></font>
	</td>
	<td width="35%" class="tabela_seznam" style="vertical-align: top;"><font class="pisava_normal"><b>Odgovor</b></font>
	</td>
</tr>
$vprasalnik_seznam
</tbody>
</table>
<a name='konec'></a>
AdsdsatTweq;
?>