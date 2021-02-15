<?php

//exercice 1 : 
// lien reddit

$site = "https://www.redit.com/";
$sitenom = "Reddit Hug";
function lien($site, $sitenom)
{
    echo "<a href=\"$site\">$sitenom</a>";
}
lien($site, $sitenom);

// exo 2 


$now = date_create('2020-02-10');
$endstage = date_create('2020-08-20');
$intervalle = date_diff($endstage, $now);
echo $intervalle->format("%R%a days");
