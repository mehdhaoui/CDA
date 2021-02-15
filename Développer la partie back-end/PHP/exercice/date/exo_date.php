<h3>Exo 1</h3><br>
<?php
//exo 1 date
$date = "2019-07-14";
$format_date = strtotime($date);
echo date('W', $format_date); // on selectionne le nombre de semaine avec W
?>
<br>
<h3>Exo 2</h3><br>
<!-- exo 2 -->
<?php
$datenow = date('Y-m-d'); //mise en variable de la date du jour
$now = date_create($datenow); //creer une date avec la date du jour
$endstage = date_create('2020-08-20'); // creer la date de fin de formation
$intervalle = date_diff($endstage, $now); // difference entre les deux dates
echo $intervalle->format("%a jours avant la fin de la formation");
?>
<br>
<h3>Exo 3</h3><br>
<!-- exo 3 -->
<?php
$date = new dateTime();
if (!$date->format('L')) {
    echo "l'année est pas bissextile";
} else {
    echo "l'année est bissextile";
}

?>
<!-- exo 4 -->
<h3>Exo 4</h3><br>
<?php
$Date = DateTime::createFromFormat("d/m/Y", "10/10/2019");
$geterror = $date->getLastErrors();
if ($geterror['warning_count'] >= 1) {
    echo "Il y a une erreur";
} else {
    echo "la date est correcte";
}

?>
<!-- exo 5 -->
<h3>Exo 5</h3><br>
<?php $heure = date('H'); //mise en variable de l'heure
$minutes = date('i'); //mise en variable des minutes
echo "il est actuellement $heure h $minutes";
?>
<br>

<!-- exo 6 -->
<h3>Exo 6</h3><br>
<?php
$mois = date("Y-m-d", strtotime("+1 month")); //strtotime pour ajouter un mois
echo $mois;
?>