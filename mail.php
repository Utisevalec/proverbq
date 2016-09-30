<?php
#zero
$onload = "";

#chek if
if ($_POST['send'] == '0N' AND strlen($_POST['koda']) == 6 AND strlen($_POST['email']) > 6) {
	#za git
	mail($_POST['email'],"Vprasalnik","Vprasalnik - prijavna koda','Spletni naslov: http://vprasalnik.tisina.net\nPrijavna koda: $_POST[koda]");
}


#obrazec
echo <<<Ssad_mail_tt
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<meta http-equiv="X-UA-Compatible" content="chrome=1">
		<title>Pošiljanje na e-mail</title>
		<meta name="description" content="Posiljanje na e-mail!">
		<meta name="keywords" content="vprašalnik, anketa, matej, meterc, pregovori">
		<link rel="stylesheet" href="stil.css" type="text/css">
	</head>
<body onload="$onload" bgcolor="#D4D0C7" topmargin="10" leftmargin="20" dir="ltr">
<font class="pisava_normal">
<form name="prijava" action="mail.php" method="POST">
<input type="hidden" name="koda" value="$_REQUEST[koda]">
<input type="hidden" name="send" value="0N">
<br>
E-mail naslov: <input class="obrazec_normal" type="text" name="email" size="22" value=""> <input type="submit" class="obrazec_normal" name="prijava" value="OK">
</form>
</font>
<font class="pisava_mala">
E-mail naslov se NE bo shranil in bo uporabljen samo enkrat, za potrebe pošiljanja unikatne kode. Elektronsko obvestilo s kodo bo poslano v roku 1-5 min.
</font>
</body>
</html>
Ssad_mail_tt
?>