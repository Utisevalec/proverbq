<?php
#prijava in - preveri sifro in se prijavi

#q
$mysql_ukaz = "SELECT id, koda FROM resevalci WHERE koda = '$_POST[koda]' LIMIT 1";
$mysql_zapis = mysql_query($mysql_ukaz,$mysql_povezava);
$vrstica = mysql_fetch_row($mysql_zapis);

#preveri ce je
if (isset($vrstica[0]) AND $vrstica[0] > 0) {
	$_SESSION['id_user'] = $vrstica[0];
	$_SESSION['koda_user'] = $vrstica[1];	
	echo <<<ASASDAsssdz66
<font class="pisava_normal">
Poteka postopek prijave, prosimo počakajte trenutek.
<script name="js1">
setTimeout("prijava()",2500);
function prijava() {
	location.href = 'index.php?akcija=none';
}
</script>
</font>
ASASDAsssdz66;
}
else {
	echo "<font class='pisava_normal'>Koda ni pravilna, vrnite se <a href='?akcija=prijava'>nazaj</a> in poskusite ponovno!</font>";
}


?>