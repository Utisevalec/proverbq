<?php

#filter
$filter_out = "1 = 1";
if ($_GET['filter'] == 'all') {
	$filter_out = "1 = 1";
}
elseif ($_GET['filter'] > 0 AND $_GET['filter'] < 7) {
	$filter_out = "tip = $_GET[filter]";
}

#seznam resevalcev
$mysql_ukaz = "SELECT * FROM vnos_extra WHERE $filter_out ORDER BY cas DESC";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
while ($resevalci_22 = mysql_fetch_assoc($mysql_zapis)) {
	#nl
	$resevalci_22['vnos'] = nl2br($resevalci_22['vnos']);
	#za vn	
	$tabela_vn = <<<SdgmPOwsD
	$tabela_vn
	<tr>
		<td style="vertical-align: top;">$resevalci_22[resevalec]</td>
		<td style="vertical-align: top;">$resevalci_22[tip]</td>
		<td style="vertical-align: top;">$resevalci_22[vnos]</td>
		<td style="vertical-align: top;">$resevalci_22[cas]</td>
	</tr>
SdgmPOwsD;
}

#vn
echo <<<Asd_ff_mm56

<b>Seznam odgovorov na dodatna vprašanja</b><br><br>
<script name='js123'>
function filter(vrednost) {
	location.href = 'index.php?akcija=dpd_sez&filter='+vrednost;
}

setTimeout('go_go()',100);
function go_go() {
	document.getElementById('tip_id').value = '$_GET[filter]';
}
</script>
<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
	<tr>
		<td style="vertical-align: top;"><b>ID reševalca</b></td>
		<td style="vertical-align: top;"><b>tip</b> <select id='tip_id' onchange="filter(this.value)" name="tip"><option value='all'>vsi</option><option value='1'>vpr. 1</option><option value='2'>vpr. 2</option><option value='3'>vpr. 3</option><option value='4'>vpr. 4</option><option value='5'>vpr. 5</option><option value='6'>vpr. 6</option></select></td>
		<td style="vertical-align: top;"><b>besedilo</b></td>
		<td style="vertical-align: top;"><b>čas</b></td>
	</tr>
	$tabela_vn
</tbody>
</table>
Asd_ff_mm56;
?>