<?php
unset($_SESSION['id_user']);
unset($_SESSION['id_koda']);
unset($_SESSION['div_color']);
?>
<font class="pisava_normal">
Poteka postopek odjave, prosimo počakajte trenutek.
<script name="js1">
setTimeout("odjava()",2500);
function odjava() {
	location.href = 'index.php';
}
</script>
</font>