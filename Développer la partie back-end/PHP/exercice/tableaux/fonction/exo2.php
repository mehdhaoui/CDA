<?php
function sum($array)
{
    $result = array_sum($array);
    return $result;
}
$tab = array(4, 3, 8, 2);
$somme = sum($tab);
echo $somme;
