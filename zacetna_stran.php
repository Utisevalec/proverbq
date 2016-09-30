<?php
//zacetna stran

echo <<<AdsdsatTweq
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
</script>
<font class="pisava_normal">
Pozdravljeni!
<br><br>
Pred vami je vprašalnik, namenjen oceni poznavanja pregovorov in rekov med govorci slovenskega jezika. 
<br><br>
Računalnik vam ob registraciji dodeli geslo, s katerim se kasneje vedno prijavite. Vprašalnik je zaradi obsežnega števila pregovorov zastavljen tako, da se vanj z geslom lahko kadarkoli vrnete in nadaljujete z izpolnjevanjem. Z odjavo se odgovori samodejno shranijo. Ob  prijavi vam program pokaže naslednje vprašanje, na katerega še niste odgovorili. Sproti imate možnost vpogleda v podatkovno bazo vaših odgovorov, v primeru, da bi radi kakšen svoj odgovor spremenili. Vsakemu anketirancu se pregovori, ki jih še ni ocenil, kažejo v drugem (naključnem) vrstnem redu. Spremljate lahko tudi, koliko pregovorov ste že ocenili in koliko vam jih še ostane.
<br><br>Na koncu vprašalnika vas čaka še kratek <u>obrazec z nekaj dodatnimi vprašanji</u>. Med drugim imate v tem obrazcu možnost navesti pregovore, ki se jih še spomnite, pa jih v jedru vprašalnika niste zasledili.
<font class="pisava_mala">
<br><br>POSTOPEK REŠEVANJA VPRAŠALNIKA <a href="javascript:razsiri('postopek')"><img onmouseover="Tip('Prikaži/skrij tekst o postopkih reševanja vprašalnika!')" src="vec.png" width="24" height="24" style="position: relative; top: 5px; left: 0px; z-index: 3;" border="0"></a><br>
<span style="display: none; text-align: justify;" id="postopek">
Vsak anketiranec ostane anonimen. Po prijavi in pred jedrom vprašalnika izpolnite le <u>5 osnovnih podatkov</u>. Navedite vaš <u>spol</u>, <u>starost</u> in <u>stopnjo izobrazbe</u>. Nato izberite <u>narečno skupino območja, kjer ste odraščali</u> (narečne skupine so širša enota kot posamezna narečja). Poleg tega izberite <u>narečno skupino območja, kjer živite sedaj</u>. Pri teh dveh vprašanjih imate poleg sedmih narečnih skupin tudi možnost »drugo« z vpisom pripombe, ki bi jo morda želeli dodati. Ti podatki so potrebni, da bodo rezultati vprašalnika lahko raziskani in statistično ovrednoteni v širšem kontekstu. V vaši individualni oceni vsake posamezne pregovorne enote izberite eno od petih možnosti: <u>1.</u> poznam in uporabljam; <u>2.</u> poznam, a ne uporabljam; <u>3.</u> ne poznam, a razumem; <u>4.</u> ne poznam in ne razumem ali <u>5.</u> poznam varianto (možnost dodajanja oblike, v kakršni pregovor poznate vi, če ocenite, da se bistveno razlikuje od navedene).
<br><br>
</span>
O PROJEKTU VPRAŠALNIKA <a href="javascript:razsiri('oprojektu')"><img onmouseover="Tip('Prikaži/skrij tekst o projektu vprašalnika!')" src="vec.png" width="24" height="24" style="position: relative; top: 5px; left: 0px; z-index: 3;" border="0"></a><br>
<span style="display: none; text-align: justify;" id="oprojektu">
Vprašalnik je izdelan po vzoru vprašalnika svetovno priznanega frazeologa Petra Ďurča. Gradivo za vprašalnik je bilo po njegovem vzoru kritično ovrednoteno in urejeno v izhodiščni korpus. Izpisano je bilo iz dveh slovarjev: Slovarja slovenskega knjižnega jezika in Frazeološkega slovarja v petih jezikih Josipa Pavlice. Vseh enot je 918. Marsikatera frazeološka enota iz teh virov je tudi že zastarela. Eden izmed namenov  raziskave je prav to, da se s kriterijem poznavanja in razumevanja enot pri večjem številu govorcev zameji slovenski paremiološki optimum – nabor enot, ki so znane in razumljive večini govorcev slovenščine. Primerjava slovenskega paremiološkega optimuma s slovaškim, ki ga je določil Ďurčo, bo predstavljala jedro doktorske disertacije. Določitev optimuma bo kasneje lahko koristila kot izhodišče še vrsti drugih frazeoloških (in ožje: paremioloških) raziskav.
<br><br>
</span>
ŠE NEKAJ CILJEV VPRAŠALNIKA <a href="javascript:razsiri('cilji')"><img onmouseover="Tip('Prikaži/skrij tekst o ciljih vprašalnika!')" src="vec.png" width="24" height="24" style="position: relative; top: 5px; left: 0px; z-index: 3;" border="0"></a><br>
<span style="display: none; text-align: justify;" id="cilji">
Prvi pomemben cilj vprašalnika je, kot smo že navedli, ugotoviti, katere pregovorne enote iz slovarskih virov sodijo v aktivni besedni zaklad govorcev slovenščine. Obenem bo možno oceniti tudi, katere enote so žive, pa jih slovarski viri ne navajajo in kakšne variantne podobe slovarskih enot so med govorci še prisotne. Podatki, ki jih bo prinesel vprašalnik, pa ne bodo pripomogli le k raziskavi v okviru doktorske disertacije. Na kratko vam želimo predstaviti, kaj bodo še omogočili v okviru slovenske in svetovne frazeologije.<br>
Z zamejitvijo pregovornih enot (paremij) bo nastala osnova za raziskovanje slovenskega paremiološkega gradiva v prihodnosti. Kot smo napisali že v uvodu, nam bo gradivo, ki smo ga izpisali iz dveh jezikovnih priročnikov, po zamejitvi s pomočjo kriterija poznavanja in razumevanja dalo predstavo o sedanji stopnji živosti in razumljenosti teh oblik med govorci slovenščine. Poleg naše primerjave zamejenega slovenskega paremiološkega optimuma s slovaškim, bo seveda mogoča primerjava tudi s stanjem v drugih jezikih, v katerih bo paremiološki optimum določen. Za nas je posebej zanimivo vprašanje bližine (pa tudi oddaljenosti in specifik) frazeologije med posameznimi slovanskimi jeziki. <br>
Sodoben pristop k raziskovanju paremiološkega gradiva pa se ne more več zadovoljiti le z osredotočanjem na gradivo, ki je bilo do sedaj predstavljeno bodisi v normativnih priročnikih (npr. slovarjih) bodisi bolj folklorističnih virih (npr. zbirkah). Raziskovanje pregovorov, rekov in sorodnih enot se po sodobnih znanstvenih smernicah, ki jih predstavljata med drugimi vrhunska frazeologa František Čermák in Wolfgang Mieder, mora razširiti na ustaljene enote, ki so žive, razširjene, ne pa še registrirane. Govorec določenega jezika se pogosto niti ne zaveda, kako zajetna množica novonastalih frazeoloških enot ga obkroža in vstopa (vsaj delno) tudi v njegov lastni nabor jezikovnih sredstev. V mislih imamo tako pregovorne enote, prevzete (ne le prevedene!) iz drugih jezikov, kakor tudi enote, ki so nedavno prešle v pregovorno rabo tudi od drugod (npr. iz prvotnega statusa citatov, aforizmov, sloganov, reklamnih gesel itd.).<br>
Ravno za to, da bi jezikoslovci lahko te na novo registrirane in ovrednotene enote postavili ob bok še živim starejšim (oz. »tradicionalnim«) enotam, je zamejitev slovenskega paremiološkega optimuma še kako potrebna. Način, kako so se nekoč v govoru odmerjali ščepci folklorne »modrosti« (včasih pa tudi neslanosti) lahko jezikoslovcem pomaga razlagati sodobno »folkloro«. Obenem lahko ti sodobni »mali žanri« pomagajo bolje razumeti enote starejšega izvora.
<br>
</span>
</font>
<br>
Zahvaljujemo se vam za zanimanje in sodelovanje,
<br>
<font class="pisava_mala">
Matej Meterc (Filozofska fakulteta, Ljubljana) z mentorjema Jozefom Pallayem (Filozofska fakulteta, Ljubljana) in Petrom Ďurčem (Filozofska fakulteta, Trnava)
</font>
<br><br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2"
cellspacing="2">
<tbody>
<tr>
<td style="vertical-align: top;" align="center"><font class="pisava_normal"><b>Izberite vaš status:</b></font>
</td>
</tr>
<tr>
<td style="vertical-align: top;">
	<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
	<tr>
	<td style="vertical-align: top; width: 49%;" align="center"><input class="obrazec_normal" onclick="location.href = '?akcija=nov'" type="button" style="width: 97%; height: 50px" name="t2" value="sem nov reševalec, želim sodelovati">
	</td>
	<td style="vertical-align: top; width: 51%;" align="center"><input class="obrazec_normal" onclick="location.href = '?akcija=prijava'" type="button" style="width: 99%; height: 50px" name="t1" value="imam kodo, želim nadaljevati z reševanjem">	
	</td>
	</tr>
	</tbody>
	</table>	
</td>
</tr>
</tbody>
</table>
</font>
AdsdsatTweq;
?>